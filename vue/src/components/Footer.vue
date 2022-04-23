<template>
<footer class="bg-gray-100 text-center lg:text-left">
  <div class="p-6 text-gray-800">
    <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-3 xs:grid-cols-1 gap-4 md:gap-0">
      <div class="mb-6 md:mb-0">
          <center>
            <img src="@/assets/logo.png" class="h-32 md:h-20 xs:h-16" alt="Logo KSD" />
          </center>
      </div>

      <div class="mb-6 md:mb-0 text-center">
        <h5 class="font-medium mb-2 uppercase">General Information</h5>

        <p class="mb-4">
                Jam Operasional<br>Senin-Sabtu<br>8:30 - 17:00
        </p>
      </div>

      <div class="mb-6 md:mb-0 text-center flex flex-col justify-center">
        <h5 class="font-medium mb-2 uppercase">Lokasi Kantor</h5>
        <p class="mb-4">Jln. Sulawesi, Gg. Keluarga, No.7</p>
        <div class="flex justify-center wrapper">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.817211786115!2d109.32341001409586!3d-0.042711035544086236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d59066d968bad%3A0xd0c3a192027beb5b!2sGg.%20Keluarga%20No.7%2C%20Akcaya%2C%20Kec.%20Pontianak%20Sel.%2C%20Kota%20Pontianak%2C%20Kalimantan%20Barat%2078113!5e0!3m2!1sid!2sid!4v1650681070487!5m2!1sid!2sid" width="390" height="260" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

    </div>
  </div>

  <div class="text-center items-center text-white p-4 bg-purple-600">
    © 2021 Copyright:
    <a class="text-white" href="https://tailwind-elements.com/">Kita Serba Digital</a>
  </div>
</footer>   
</template>

<style>
  .wrapper {
    position: relative;
    overflow: hidden;
    padding-top: 56.25%;
  }
  .wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
</style>