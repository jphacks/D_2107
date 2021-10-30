<template>
  <app-layout title="add">
    <t-input value="hello"></t-input>
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
            <h2 class="max-w-sm mx-auto md:w-1/3">仕事タイトル</h2>
            <div class="max-w-sm mx-auto md:w-2/3">
              <div class="relative">
                <input
                  type="text"
                  id="user-info-email"
                  v-model="jobTitle"
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
                  placeholder="仕事タイトル"
                />
              </div>
            </div>
          </div>
          <hr />
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
                  <label for="business">業界を選択してください</label>
                  <select
                    v-model="selectBusiness"
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
                      v-for="(business, key) in allBusinesses"
                      :key="key"
                      :value="key"
                    >
                      {{ business }}
                    </option>
                  </select>
                </div>
              </div>
              <div>
                <div class="relative">
                  <label for="occupation">職種を選択してください</label>
                  <select
                    v-model="selectOccupation"
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
                  >
                    <option
                      v-for="(occupation, key) in allOccupations"
                      :key="key"
                      :value="key"
                    >
                      {{ occupation }}
                    </option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <hr />
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
            <h2 class="max-w-sm mx-auto md:w-1/3">期間</h2>
            <div class="max-w-sm mx-auto space-y-5 md:w-2/3">
              <div>
                <div class="relative">
                  <input
                    type="datetime"
                    v-model="jobStartDate"
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
                  />
                </div>
              </div>
              <div>
                <div class="relative">
                  <input
                    type="text"
                    v-model="jobEndDate"
                    id="user-info-phone"
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
                    placeholder="終了日"
                  />
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
              更新
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


export default defineComponent({
  components: {  
    AppLayout,
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
    
  },
  props: {
    userId: 0,
    allBusinesses: {},
    allOccupations: {},
    jobExperience: {},
  },
  data: () => ({
    valid: true,
    jobTitle: "",
    selectBusiness: null,
    selectOccupation: null,
    checkbox: false,
    activePicker: null,
    date: null,
    jobStartDate: null,
    menuStart: false,
    jobEndDate: null,
    menuEnd: false,
  }),

  methods: {
    save() {
      console.log('hello')
      axios
        .post("/job-experience/edit/" + this.jobExperience.id , {
          userId: this.userId,
          jobTitle: this.jobTitle,
          businessId: this.selectBusiness,
          ocuppationId: this.selectOccupation,
          workStartDate: this.jobStartDate,
          workEndDate: this.jobEndDate,
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
  created() {
    this.jobTitle = this.jobExperience.title
    this.selectBusiness = this.jobExperience.master_business_id
    this.selectOccupation = this.jobExperience.master_occupation_id
    this.jobStartDate = this.jobExperience.work_start_date
    this.jobEndDate = this.jobExperience.work_end_date
  },
});
</script>
