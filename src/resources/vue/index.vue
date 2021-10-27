<template>
  <v-card
    class="mx-auto"
  >
    <v-card
      dark
      flat
    >
      <v-img
        src="https://cdn.vuetifyjs.com/images/cards/forest.jpg"
        gradient="to top, rgba(0,0,0,.44), rgba(0,0,0,.44)"
        max-height="500"
      >
        <v-container class="fill-height">
          <v-row align="center">
            <strong class="text-h1 font-weight-regular mr-6 pl-3">
              <v-avatar color="indigo" size="100">
                <v-icon dark size="95%">
                  mdi-account-circle
                </v-icon>
              </v-avatar>
            </strong>
            <v-row justify="end">
              <div class="text-h5 font-weight-light">
                Monday
              </div>
              <div class="text-uppercase font-weight-light">
                February 2015
              </div>
            </v-row>
          </v-row>
        </v-container>
      </v-img>
    </v-card>

    <v-card-text class="py-0">
      <v-timeline
        align-top
        dense
      >
        <div v-for="experience in experiences" :key="experience.id">
          <v-timeline-item
            color="pink"
            small
          >
            <v-row class="pt-1">
              <v-col cols="3">
                <strong>{{experience.work_start_date}}</strong>
              </v-col>
              <v-col>
                <strong>{{experience.title}}</strong>
                <div class="text-caption">
                  Mobile App
                </div>
              </v-col>
            </v-row>
          </v-timeline-item>
        </div>

        <v-timeline-item
          color="pink"
          small
        >
          <v-row class="pt-1">
            <v-col cols="3">
              <strong>5pm</strong>
            </v-col>
            <v-col>
              <strong>New Icon</strong>
              <div class="text-caption">
                Mobile App
              </div>
            </v-col>
          </v-row>
        </v-timeline-item>

        <v-timeline-item
          color="teal lighten-3"
          small
        >
          <v-row class="pt-1">
            <v-col cols="3">
              <strong>3-4pm</strong>
            </v-col>
            <v-col>
              <strong>Design Stand Up</strong>
              <div class="text-caption mb-2">
                Hangouts
              </div>
              <v-avatar>
                <v-img
                  src="https://avataaars.io/?avatarStyle=Circle&topType=LongHairFrida&accessoriesType=Kurt&hairColor=Red&facialHairType=BeardLight&facialHairColor=BrownDark&clotheType=GraphicShirt&clotheColor=Gray01&graphicType=Skull&eyeType=Wink&eyebrowType=RaisedExcitedNatural&mouthType=Disbelief&skinColor=Brown"
                ></v-img>
              </v-avatar>
              <v-avatar>
                <v-img
                  src="https://avataaars.io/?avatarStyle=Circle&topType=ShortHairFrizzle&accessoriesType=Prescription02&hairColor=Black&facialHairType=MoustacheMagnum&facialHairColor=BrownDark&clotheType=BlazerSweater&clotheColor=Black&eyeType=Default&eyebrowType=FlatNatural&mouthType=Default&skinColor=Tanned"
                ></v-img>
              </v-avatar>
              <v-avatar>
                <v-img
                  src="https://avataaars.io/?avatarStyle=Circle&topType=LongHairMiaWallace&accessoriesType=Sunglasses&hairColor=BlondeGolden&facialHairType=Blank&clotheType=BlazerSweater&eyeType=Surprised&eyebrowType=RaisedExcited&mouthType=Smile&skinColor=Pale"
                ></v-img>
              </v-avatar>
            </v-col>
          </v-row>
        </v-timeline-item>

        <v-timeline-item
          color="pink"
          small
        >
          <v-row class="pt-1">
            <v-col cols="3">
              <strong>12pm</strong>
            </v-col>
            <v-col>
              <strong>Lunch break</strong>
            </v-col>
          </v-row>
        </v-timeline-item>

        <v-timeline-item
          color="teal lighten-3"
          small
        >
          <v-row class="pt-1">
            <v-col cols="3">
              <strong>9-11am</strong>
            </v-col>
            <v-col>
              <strong>Finish Home Screen</strong>
              <div class="text-caption">
                Web Appp
              </div>
            </v-col>
          </v-row>
        </v-timeline-item>
      </v-timeline>
    </v-card-text>
  </v-card>
</template>

<script>
  export default {
    data: () => ({
      allowSpaces: false,
      match: 'Foobar',
      max: 0,
      model: 'Foobar',
      experiences: []
    }),
    created() {
      var __this = this
            $.ajax({
                type: 'GET',
                url: 'api/get_all_experiences',
                dataType: 'json',
            })
                .done(function(response){
                    console.log(response)
                    __this.experiences = response
                })
                .fail(function(error){
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
