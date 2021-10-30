<template>
  <app-layout title="Index">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        トップページ
      </h2>
    </template>
      <div class="bg-deep-purple-accent-700">
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
      <div class="max-w-xl sm:mx-auto lg:max-w-2xl">
        <div class="flex flex-col mb-16 sm:text-center sm:mb-0">
          <a href="/" class="mb-6 sm:mx-auto">
            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-teal-accent-400">
              <svg class="w-10 h-10 text-deep-purple-900" stroke="currentColor" viewBox="0 0 52 52">
                <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
              </svg>
            </div>
          </a>
          <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
            <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-white sm:text-4xl md:mx-auto">
              <span class="relative inline-block">
                <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-deep-purple-accent-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                  <defs>
                    <pattern id="700c93bf-0068-4e32-aafe-ef5b6a647708" x="0" y="0" width=".135" height=".30">
                      <circle cx="1" cy="1" r=".7"></circle>
                    </pattern>
                  </defs>
                  <rect fill="url(#700c93bf-0068-4e32-aafe-ef5b6a647708)" width="52" height="24"></rect>
                </svg>
                <span class="relative">The</span>
              </span>
              quick, brown fox jumps over a lazy dog
            </h2>
            <p class="text-base text-indigo-100 md:text-lg">
              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque rem aperiam, eaque ipsa quae.
            </p>
          </div>
          <div class="justify-items-center">
            <span class="px-4 py-2 mx-4 w-16 text-base rounded-full text-white-500 border border-white-500 undefined ">
                資格
            </span>
            <span class="px-4 py-2 mx-4 w-16 text-base rounded-full text-white-500 border border-white-500 undefined ">
                資格
            </span>
            <span class="px-4 py-2 mx-4 w-16 text-base rounded-full text-white-500 border border-white-500 undefined ">
                資格
            </span>
            <a href="user-license/create" class="button px-4 py-2 mx-4 w-16 text-base rounded-full text-white-500 border border-white-500 undefined ">
                ＋
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <section class="text-gray-600 body-font">
      <div class="container px-5 pt-24  mx-auto place-items-center text-align-center">
        <a href="/job-experience/create" class="btn btn-primary btn-active" role="button" aria-pressed="true">追加</a> 
      </div>
      <div class="container px-5 pb-24 mx-auto flex flex-wrap">
        <div
          v-for="(experience, key) in experiences"
          :key="experience.id"
          class="flex relative pt-10 pb-20 sm:items-center md:w-2/3 mx-auto"
        >
        <a :href="'/job-experience/edit/' + experience.id ">
          <div
            class="h-full w-6 absolute inset-0 flex items-center justify-center"
          >
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div
            class="
              flex-shrink-0
              w-6
              h-6
              rounded-full
              mt-10
              sm:mt-0
              inline-flex
              items-center
              justify-center
              bg-indigo-500
              text-white
              relative
              z-10
              title-font
              font-medium
              text-sm
            "
          >
            {{ key + 1 }}
          </div>
          <div
            class="
              flex-grow
              md:pl-8
              pl-6
              flex
              sm:items-center
              items-start
              flex-col
              sm:flex-row
            "
          >
            <div
              class="
                flex-shrink-0
                w-24
                h-24
                bg-indigo-100
                text-indigo-500
                rounded-full
                inline-flex
                items-center
                justify-center
              "
            >
              <svg
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                class="w-12 h-12"
                viewBox="0 0 24 24"
              >
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
              </svg>
            </div>
            <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
              <h2 class="font-medium title-font text-gray-900 mb-1 text-xl">
                {{ experience.work_start_date }}
              </h2>
              <p class="leading-relaxed">{{ experience.title }}</p>
            </div>
          </div>
        </a>
        </div>
      </div>
    </section>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
export default defineComponent({
  components: {
    AppLayout,
  },
  props: {
    experiences: [],
  },
  data: () => ({
    allowSpaces: false,
    match: "Foobar",
    max: 0,
    model: "Foobar",
  }),

  methods: {
    validateField() {
      this.$refs.form.validate();
    },
  },
});
</script>
