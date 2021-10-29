<template>
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-wrap">
      <div class="flex flex-wrap w-full">
        <div class="">
          <div class="flex relative pb-12" v-for="experience in experiences" :key="experience.id">
            <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
              <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
              </svg>
            </div>
            <div class="flex-grow pl-4">
              <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">{{ experience.work_start_date }}</h2>
              <p class="leading-relaxed">{{ experience.title }}</p>
            </div>
          </div>
          <div class="flex relative">
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
              </svg>
            </div>
            <div class="flex-grow pl-4">
              <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider"></h2>
              <p class="leading-relaxed"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: {
      experiences: []
    },
    data: () => ({
      allowSpaces: false,
      match: 'Foobar',
      max: 0,
      model: 'Foobar',
      experiences: [{
        work_start_date: "",
        title: "",
        id: 0
      }]
    }),
    created() {
      axios.get('api/get_all_experiences')
                .then(function(response){
                    console.log(response)
                    this.experiences = response.response
                })
                .catch(function(error){
                    console.log(console.log(error))
                })
      axios.get('api/user')
                .then(function(response){
                    console.log(response)
                })
                .catch(function(error){
                    console.log(console.log(error))
                })
    },

    methods: {
      validateField () {
        this.$refs.form.validate()
      },
    },
  }
</script>
