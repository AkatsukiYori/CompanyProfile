<template>
    <div id="about" class=" rounded-t-lg mt-lg-n2 py-12 lg:px-8 xs:px-2 m-auto flex flex-wrap justify-center">
        <p class="font-bold text-purple-900 lg:text-5xl md:text-4xl sm:text-4xl xs:text-4xl text-center pb-8">Tentang Kita Serba Digital</p>
        <div class="grid lg:grid-cols-3 md:px-5 sm:grid-cols-1 xs:grid-cols-1 px-4 gap-8">
            
            <center v-for="tentang in tentangKami" :key="tentang.id">
                <img :src="tentang.image" class="h-96 xs:h-64" alt="Siapa?"/>
                <p class="font-bold text-purple-900 text-4xl p-4 xs:text-3xl">{{ tentang.judul }}</p>
                <span class="xs:text-sm text-justify capitalize" v-html="tentang.deskripsi"></span>
            </center>
            
        </div>
    </div>
</template>
<script>
export default{
    props: ['tentangKami']
}
</script>