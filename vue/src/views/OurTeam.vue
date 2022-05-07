<template>
  <Navbar />
  <MemberTeam :listCategory="listCategory"/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import MemberTeam from '@/components/ComponentOurTeam/MemberTeam.vue';

export default {
  data(){
    return{
        listCategory: [
            {
                id: 1,
                category: "leadership",
                members: [
                    {id: 1, member: "Firman Cahyadi", division: "Chief Executive Officer", image: require('@/assets/OurTeam/Firman.png')},
                    {id: 2, member: "Firman Cahdddyadi", division: "Chief Executive Officer", image: require('@/assets/OurTeam/Firman.png')},
                    {id: 3, member: "Firman Cahyadi", division: "Chief Executive Officer", image: require('@/assets/OurTeam/Firman.png')},
                    {id: 4, member: "Firman Cahyadi", division: "Chief Executive Officer", image: require('@/assets/OurTeam/Firman.png')},
                ]
            },
            {
                id: 2,
                category: "programmer",
                members: [
                    {id: 1, member: "Firman Cahdddyadi", division: "Chief Executive Officer", image: require('@/assets/OurTeam/Firman.png')},
                    {id: 2, member: "Firman Cahyadi", division: "Chief Executive Officer", image: require('@/assets/OurTeam/Firman.png')},
                    {id: 3, member: "Firman Cahyadi", division: "Chief Executive Officer", image: require('@/assets/OurTeam/Firman.png')},
                    {id: 4, member: "Firman Cahyadi", division: "Chief Executive Officer", image: require('@/assets/OurTeam/Firman.png')},
                ]
            },
            {
                id: 3,
                category: "designer",
                members: [
                    {id: 1, member: "Firman Cahyadi", division: "Chief Executive Officer", image: require('@/assets/OurTeam/Firman.png')},
                    {id: 2, member: "Firman Cahyadi", division: "Chief Executive Officer", image: require('@/assets/OurTeam/Firman.png')},
                    {id: 3, member: "Firman Cahyadi", division: "Chief Executive Officer", image: require('@/assets/OurTeam/Firman.png')},
                    {id: 4, member: "Firman Cahyadi", division: "Chief Executive Officer", image: require('@/assets/OurTeam/Firman.png')},
                ]
            },
        ]
    }
  },
  components:{
    Navbar,
    MemberTeam,
  },
}
</script>

<style>

</style>