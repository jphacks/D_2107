<template>
  <v-app>
    <v-container>
      <v-form
        ref="form"
        v-model="valid"
        lazy-validation
      >
        <v-text-field
          v-model="name"
          :counter="10"
          :rules="nameRules"
          label="仕事タイトル"
          required
        ></v-text-field>

        <v-select
          v-model="select"
          :items="items"
          :rules="[v => !!v || 'Item is required']"
          label="職業"
          required
        ></v-select>

        <v-select
          v-model="select"
          :items="items"
          :rules="[v => !!v || 'Item is required']"
          label="職種"
          required
        ></v-select>

        <v-date-picker
          v-model="date"
          class="mt-4"
          min="2016-06-15"
          max="2018-03-20"
        ></v-date-picker>

        <v-btn
          color="warning"
          @click="save()"
        >
          保存
        </v-btn>
      </v-form>
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

      }
    },
    created() {
      
    }
  }
</script>
