<template>
    <v-container fluid>
      <v-card text-align="center">
        <v-row class="justify-center">
          <v-col
            class="d-flex"
            cols="12"
            sm="6"
          >
          <v-text-field
            v-model="jobTitle"
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
            v-model="selectBusiness"
            :items="businesses"
            item-text="name"
            item-value="id"
            :rules="[v => !!v || '必須です']"
            solo
            label="職業"
            required
            return-object
          ></v-select>

          </v-col>
        </v-row>

        <v-row class="justify-center">
          <v-col
            class="d-flex"
            cols="12"
            sm="6"
          >
          <v-select
          v-model="selectOccupation"
          :items="occupations"
          item-text="name"
          item-value="id"
          :rules="[v => !!v || '必須項目です']"
          solo
          label="職種"
          required
          return-object
        ></v-select>
        </v-col>
        </v-row>

        <v-row class="justify-center">
          <v-col
            class="d-flex"
            cols="12"
            sm="6"
          >
          <v-menu
            ref="menuStart"
            v-model="menuStart"
            :close-on-content-click="false"
            transition="scale-transition"
            offset-y
            min-width="auto"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-text-field
                v-model="jobStartDate"
                label="勤務開始日"
                prepend-icon="mdi-calendar"
                readonly
                v-bind="attrs"
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker
              v-model="jobStartDate"
              :active-picker.sync="activePicker"
              :max="(new Date(Date.now())).toISOString().substr(0, 10)"
              min="1950-01-01"
              @change="saveStartDate"
            ></v-date-picker>
        </v-menu>
        </v-col>
        </v-row>
        
        <v-row class="justify-center">
          <v-col
            class="d-flex"
            cols="12"
            sm="6"
          >
          <v-menu
            ref="menuEnd"
            v-model="menuEnd"
            :close-on-content-click="false"
            transition="scale-transition"
            offset-y
            min-width="auto"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-text-field
                v-model="jobEndDate"
                label="勤務終了日"
                prepend-icon="mdi-calendar"
                readonly
                v-bind="attrs"
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker
              v-model="jobEndDate"
              :active-picker.sync="activePicker"
              :max="(new Date(Date.now())).toISOString().substr(0, 10)"
              min="1950-01-01"
              @change="saveEndDate"
            ></v-date-picker>
        </v-menu>
        </v-col>
        </v-row>

        <v-row class="justify-center">
          <v-btn
            color="warning"
            @click="save()"
            class="mb-5"
          >
            保存
          </v-btn>
        </v-row>
      </v-card>
        
      </v-container>
</template>

<script>
  export default {
    data: () => ({
      valid: true,
      jobTitle: '',
      selectBusiness: null,
      selectOccupation: null,
      businesses: [],
      occupations: [],
      checkbox: false,
      activePicker: null,
      date: null,
      jobStartDate: null,
      menuStart: false,
      jobEndDate: null,
      menuEnd: false,
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
        var data = {
                  jobTitle: __this.jobTitle,
                  businessId: __this.selectBusiness.id,
                  ocuppationId: __this.selectOccupation.id,
                  workStartDate: __this.jobStartDate,
                  workEndDate: __this.jobEndDate
                }
                console.log(data)
        
            // __this.processing = true
            $.ajax({
                type: 'POST',
                url: process.env.MIX_APP_APP_URL + '/api/job_experience/store',
                dataType: 'json',
                data: {
                  jobTitle: __this.jobTitle,
                  businessId: __this.selectBusiness.id,
                  ocuppationId: __this.selectOccupation.id,
                  workStartDate: __this.workStartDate,
                  workEndDate: __this.workEndDate
                }
            })
                .done(function(response){
                  console.log('success')
                })
                .fail(function(error){
                    console.log(console.log(error))
                })
      },
      saveStartDate (date) {
        this.$refs.menuStart.save(date)
      },
      saveEndDate (date) {
        this.$refs.menuEnd.save(date)
      }
    },
    created() {
      var __this = this
            $.ajax({
                type: 'GET',
                url: process.env.MIX_APP_APP_URL + '/api/get_businesses',
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
                url: process.env.MIX_APP_APP_URL + '/api/get_occupations',
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
    },
    watch: {
      menuStart (val) {
        val && setTimeout(() => (this.activePicker = 'YEAR'))
      },
      menuEnd (val) {
        val && setTimeout(() => (this.activePicker = 'YEAR'))
      },
    },
  }
</script>
