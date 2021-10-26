<template>
  <v-app>
    <v-container fluid>
      <v-card text-align="center">
        <v-row class="justify-center">
          <v-col
            class="d-flex"
            cols="12"
            sm="6"
          >
          <v-text-field
            v-model="name"
            label="仕事タイトル"
            required
          ></v-text-field>
          </v-col>
        </v-row>

        <v-row class="justify-center">
          <v-col
            class="d-flex"
            cols="12"
            sm="6"
          >
          <v-select
            width="80%"
            v-model="select"
            :items="businesses"
            item-text="name"
            item-value="id"
            :rules="[v => !!v || '必須です']"
            solo
            label="職業"
            hint="職業"
            persistent-hint
            required
            return-object
          ></v-select>
          <v-checkbox
      v-model="checkbox"
      :label="`Checkbox 1: ${checkbox.toString()}`"
    ></v-checkbox>
          </v-col>
        </v-row>

        <v-row class="justify-center">
          <v-col
            class="d-flex"
            cols="12"
            sm="6"
          >
          <v-select
          v-model="select"
          :items="occupations"
          item-text="name"
          item-value="id"
          :rules="[v => !!v || '必須項目です']"
          solo
          label="職種"
          hint="職種"
          persistent-hint
          required
        ></v-select>
        </v-col>
        </v-row>
        
      </v-card>
        

        <v-btn
          color="warning"
          @click="save()"
        >
          保存
        </v-btn>
      </v-container>
  </v-app>
</template>

<script>
  export default {
    data: () => ({
      valid: true,
      name: '',
      select: null,
      items: [
        'Item 1',
        'Item 2',
        'Item 3',
        'Item 4',
      ],
      businesses: [],
      occupations: [],
      checkbox: false,
      date: '2018-03-02',
    }),

    methods: {
      validate () {
        this.$refs.form.validate()
      },
      reset () {
        this.$refs.form.reset()
      },
      resetValidation () {
        this.$refs.form.resetValidation()
      },
      save() {
        var __this = this
            __this.processing = true
            $.ajax({
                type: 'POST',
                url: SAVE_RESULT_URL,
                dataType: 'json',
                data: __this.answers,
            })
                .done(function(response){
                    //response は前回の診断の mapping_num
                    console.log('saveing answers success')
                    if (response.mapping_num >= 1) {
                        console.log('2回目以降')
                        window.location.href = NTH_RESULT_URL;
                    } else {
                        console.log('初回')
                        window.location.href = GET_EVALUATIONS_URL;
                    }
                })
                .fail(function(error){
                    console.log(console.log(error))
                    __this.processing = false
                })
      }
    },
    created() {
      var __this = this
            $.ajax({
                type: 'GET',
                url: "http://localhost:8120/" + 'api/get_businesses',
                dataType: 'json',
            })
                .done(function(response){
                    //response は前回の診断の mapping_num
                    console.log(Object.keys(response).length)
                    var length = Object.keys(response).length
                    var keys = Object.keys(response)

                    console.log(response)
                    for (let i = 0; i < length; i++) {
                      __this.businesses.push({'id': keys[i], 'name': response[keys[i]]})
                    }
                    console.log('done')
                })
                .fail(function(error){
                    console.log(console.log(error))
                })
            $.ajax({
                type: 'GET',
                url: "http://localhost:8120/" + 'api/get_occupations',
                dataType: 'json',
            })
                .done(function(response){
                    //response は前回の診断の mapping_num
                    console.log(Object.keys(response).length)
                    var length = Object.keys(response).length
                    var keys = Object.keys(response)

                    console.log(response)
                    for (let i = 0; i < length; i++) {
                      __this.occupations.push({'id': keys[i], 'name': response[keys[i]]})
                    }
                    console.log('done')
                })
                .fail(function(error){
                    console.log(console.log(error))
                })
    }
  }
</script>
