<template>
  <app-layout title="add">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        資格の追加
      </h2>
    </template>
    <section class="h-screen bg-gray-100 bg-opacity-50 mt-8">
      <div class="container max-w-2xl mx-auto shadow-md md:w-3/4">
        <div
          class="
            p-4
            bg-gray-100
            border-t-2 border-indigo-400
            rounded-lg
            bg-opacity-5
          "
        ></div>
        <div class="space-y-6 bg-white">
          <div
            class="
              items-center
              w-full
              p-4
              space-y-4
              text-gray-500
              md:inline-flex md:space-y-0
            "
          >
            
          </div>
          <div
            class="
              items-center
              w-full
              p-4
              space-y-4
              text-gray-500
              md:inline-flex md:space-y-0
            "
          >
            <h2 class="max-w-sm mx-auto md:w-1/3">内容</h2>
            <div class="max-w-sm mx-auto space-y-5 md:w-2/3">
              <div>
                <div class="relative">
                  <label for="business">資格を選択してください</label>
                  <select
                    v-model="selectLicense"
                    id="business"
                    class="
                      rounded-lg
                      border-transparent
                      flex-1
                      appearance-none
                      border border-gray-300
                      w-full
                      py-2
                      px-4
                      bg-white
                      text-gray-700
                      placeholder-gray-400
                      shadow-sm
                      text-base
                      focus:outline-none
                      focus:ring-2
                      focus:ring-purple-600
                      focus:border-transparent
                    "
                    required
                  >
                    <option
                      v-for="(license, key) in allLicenses"
                      :key="key"
                      :value="key"
                    >
                      {{ license }}
                    </option>
                  </select>
                </div>
              </div>
              <div>
                <div class="relative">
                  <label for="occupation">スコアや級などがあれば記入してください</label>
                  <input
                    v-model="licenseText"
                    type="text"
                    id="occupation"
                    class="
                      rounded-lg
                      border-transparent
                      flex-1
                      appearance-none
                      border border-gray-300
                      w-full
                      py-2
                      px-4
                      bg-white
                      text-gray-700
                      placeholder-gray-400
                      shadow-sm
                      text-base
                      focus:outline-none
                      focus:ring-2
                      focus:ring-purple-600
                      focus:border-transparent
                    "
                    required
                    placeholder="900点、1級 など"
                  >
                </div>
              </div>
            </div>
          </div>
          <hr />
          
          <div class="w-full px-4 pb-4 ml-auto text-gray-500 md:w-1/3">
            <button
              type="button"
              @click="save()"
              class="
                py-2
                px-4
                bg-blue-600
                hover:bg-blue-700
                focus:ring-blue-500 focus:ring-offset-blue-200
                text-white
                w-full
                transition
                ease-in
                duration-200
                text-center text-base
                font-semibold
                shadow-md
                focus:outline-none focus:ring-2 focus:ring-offset-2
                rounded-lg
              "
            >
              追加
            </button>
          </div>
        </div>
      </div>
    </section>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import {
  Listbox,
  ListboxButton,
  ListboxLabel,
  ListboxOption,
  ListboxOptions,
} from "@headlessui/vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref } from 'vue';


export default defineComponent({
  components: {  
    AppLayout,
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
    
  },
  setup() {
            const date = ref();
            
            return {
                date
            }
        },
  props: {
    userId: 0,
    allLicenses: {},
  },
  data: () => ({
    selectLicense: null,
    licenseText: ""
  }),

  methods: {
    validate() {
      this.$refs.form.validate();
    },
    reset() {
      this.$refs.form.reset();
    },
    resetValidation() {
      this.$refs.form.resetValidation();
    },
    save() {
      console.log('hello')
      axios
        .post("/user-license/store", {
          user_id: this.userId,
          master_license_id: this.selectLicense,
          note: this.licenseText,
          received_date: "2021-08-16"
        })
        .then(function (responce) {
          console.log(responce);
          console.log("success");
          window.location.href='/index'
        })
        .catch(function (error) {
          console.log(console.log(error));
        });
    },
    saveStartDate(date) {
      this.$refs.menuStart.save(date);
    },
    saveEndDate(date) {
      this.$refs.menuEnd.save(date);
    },
  },
  watch: {
    menuStart(val) {
      val && setTimeout(() => (this.activePicker = "YEAR"));
    },
    menuEnd(val) {
      val && setTimeout(() => (this.activePicker = "YEAR"));
    },
  },
});
</script>
