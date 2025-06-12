<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Vocal Group</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #0c0f24;
      color: white;
    }
    .gold-text {
      color: #facc15;
    }
    html {
      scroll-behavior: smooth;
    }
    .bg-shared {
      background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1470&q=80');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      position: relative;
      color: white;
    }
    .bg-shared::before {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.7);
      z-index: 0;
    }
    .bg-shared > .content-wrapper {
      position: relative;
      z-index: 10;
    }
    .swiper-wrapper {
      scrollbar-width: none;
      -ms-overflow-style: none;
    }
    .swiper-wrapper::-webkit-scrollbar {
      display: none;
    }
  </style>
</head>
<body class="overflow-x-hidden">

  <!-- HEADER -->
  <header class="bg-[#0A0A23] text-white py-4 px-6 flex justify-between items-center">
    <!-- profile -->
    <a href="{{ route('eventholder.eprofile') }}" class="flex items-center mb-6">
    <div class="bg-[#F7931E] text-white font-bold w-10 h-10 rounded-full flex items-center justify-center mr-3 hover:opacity-80 transition">
        VG
    </div>
    </a>
  </div>
  
  <!-- Kanan: Nav Menu -->
  <nav class="flex space-x-6 text-sm font-medium">
    <a href="#events" class="hover:text-yellow-400 transition">Events</a>
    <a href="#services" class="hover:text-yellow-400 transition">Services</a>
    <a href="#bts" class="hover:text-yellow-400 transition">Behind the Scenes</a>
    <a href="#contact" class="hover:text-yellow-400 transition">Contact</a>
  </nav>
  </header>

  <!-- Hero + Events -->
  <div class="relative" style="background-image: url('https://limelight-arts.com.au/wp-content/uploads/2023/02/Kings-Singers-1024x683.jpg'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black opacity-60 pointer-events-none"></div>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex flex-col justify-center items-center text-center px-6 z-10 text-white">
      <h1 class="text-6xl md:text-7xl font-extrabold tracking-wide" data-aos="fade-up">Vocal <span class="gold-text">Group</span></h1>
      <p class="text-lg md:text-xl text-gray-300 mt-4 mb-8 max-w-xl" data-aos="fade-up" data-aos-delay="200">Let's Echo Impactful Voices</p>
      <a href="#events" class="mt-10 px-8 py-3 bg-yellow-400 text-black font-semibold rounded-full hover:bg-yellow-300 hover:scale-105 transition-all duration-300 shadow-lg" data-aos="zoom-in" data-aos-delay="400">Discover Us</a>
    </section>

    <!-- Events -->
    <section id="events" class="relative py-24 z-10">
      <h2 class="text-4xl font-bold text-center gold-text mb-16" data-aos="fade-down">Events</h2>
      <div class="swiper mySwiper px-6 max-w-7xl mx-auto" data-aos="fade-up">
        <div class="swiper-wrapper">
          <!-- Slides -->
          <article class="swiper-slide bg-[#181d3a] p-6 rounded-xl shadow-xl text-white w-full max-w-md transition hover:scale-105 duration-300">
            <img src="https://th.bing.com/th/id/OIP.w5L6e2ovfg2_ay8c_I0x5AHaE8" alt="Dies Natalis" class="rounded-lg mb-4 w-full h-64 object-cover" />
            <h3 class="text-2xl font-semibold gold-text truncate">Dies Natalis</h3>
            <p class="text-gray-300 mt-2 text-base">Celebration with epic performance & harmony vibes.</p>
          </article>

          <article class="swiper-slide bg-[#181d3a] p-6 rounded-xl shadow-xl text-white w-full max-w-md transition hover:scale-105 duration-300">
            <img src="https://th.bing.com/th/id/OIP.Fq5cWGLl1dzdcamxRpj0_wHaE7" alt="Phygital" class="rounded-lg mb-4 w-full h-64 object-cover" />
            <h3 class="text-2xl font-semibold gold-text truncate">Phygital</h3>
            <p class="text-gray-300 mt-2 text-base">Blending physical & digital stage experiences.</p>
          </article>

          <article class="swiper-slide bg-[#181d3a] p-6 rounded-xl shadow-xl text-white w-full max-w-md transition hover:scale-105 duration-300">
            <img src="https://burst.shopifycdn.com/photos/rock-band-on-stage_4460x4460.jpg" alt="Epiclair" class="rounded-lg mb-4 w-full h-64 object-cover" />
            <h3 class="text-2xl font-semibold gold-text truncate">Epiclair</h3>
            <p class="text-gray-300 mt-2 text-base">Musical storytelling beyond the expected.</p>
          </article>
        </div>

        <!-- Swiper Navigation -->
        <div class="swiper-button-next text-yellow-300"></div>
        <div class="swiper-button-prev text-yellow-300"></div>
      </div>
    </section>
  </div>

  <!-- Our Vibe -->
  <section class="py-24 bg-[#0c0f24] text-center">
    <h2 class="text-3xl font-bold mb-6 gold-text" data-aos="fade-up">Not Just Sound</h2>
    <p class="text-gray-300 max-w-2xl mx-auto text-lg leading-relaxed" data-aos="fade-up" data-aos-delay="200">
      We grow together — beyond music. Every tone, pause, and harmony reflects trust, passion, and soul.
    </p>
  </section>

  <!-- Collaborations -->
  <section class="py-24 bg-[#0f132d] text-center">
    <h2 class="text-3xl font-bold gold-text mb-12" data-aos="fade-down">Collaborations</h2>
    <div class="flex flex-wrap justify-center gap-12" data-aos="zoom-in-up">
      <div class="w-24 h-24 bg-yellow-400 rounded-full flex items-center justify-center text-black font-bold text-lg shadow-lg hover:scale-110 transition">PCU</div>
      <div class="w-24 h-24 bg-yellow-400 rounded-full flex items-center justify-center text-black font-bold text-lg shadow-lg hover:scale-110 transition">UKM</div>
      <div class="w-24 h-24 bg-yellow-400 rounded-full flex items-center justify-center text-black font-bold text-lg shadow-lg hover:scale-110 transition">BEM</div>
    </div>
  </section>

  <!-- Services + Behind the Scenes -->
  <section id="services" class="bg-shared py-24 px-6 md:px-12">
    <div class="content-wrapper max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-12 mb-20">
      <!-- Images -->
        <div class="grid grid-cols-2 gap-6 w-full md:w-1/2" data-aos="fade-up">
        <div class="aspect-square w-full overflow-hidden rounded-lg shadow-lg hover:scale-110 transition">
            <img src="https://th.bing.com/th/id/OIP.cm_dgaut_ELFhpwQLA05mwHaE8" class="w-full h-full object-cover" alt="Service 1" />
        </div>
        <div class="aspect-square w-full overflow-hidden rounded-lg shadow-lg hover:scale-110 transition">
            <img src="https://img2.bdbphotos.com/images/orig/l/9/l9xuxzpwvp2opzvx.jpg" class="w-full h-full object-cover" alt="Service 2" />
        </div>
        <div class="aspect-square w-full overflow-hidden rounded-lg shadow-lg hover:scale-110 transition">
            <img src="https://th.bing.com/th/id/OIP.owt1bYduE2M72AZOLlSNhwHaE8" class="w-full h-full object-cover" alt="Service 3" />
        </div>
        <div class="aspect-square w-full overflow-hidden rounded-lg shadow-lg hover:scale-110 transition">
            <img src="https://th.bing.com/th/id/OIP.a6_8-WdK66mECF1vDG949gHaE7" class="w-full h-full object-cover" alt="Service 4" />
        </div>
        </div>

      <!-- Text -->
      <div class="text-left md:w-1/2" data-aos="fade-left">
        <h2 class="text-4xl font-bold mb-6">Our Services</h2>
        <a href="#contact" class="inline-block bg-yellow-400 text-black px-6 py-3 rounded-full font-semibold mb-6 hover:scale-110 transition">CONTACT US</a>
        <p class="text-lg"> <strong>VG is also available for live performances and events</strong> — bringing energy and great music to festivals, corporate events, and special occasions.</p>
      </div>
    </div>

    <!-- Behind the Scenes -->
    <section id="bts" class="py-24 px-6 md:px-12">
      <div class="relative max-w-5xl mx-auto text-center text-white z-10">
        <h2 class="text-5xl font-bold mb-8 gold-text">Behind the Scenes</h2>
        <div class="w-full aspect-video mb-8">
          <iframe class="w-full h-full rounded-md" src="https://www.youtube.com/embed/jNQXAC9IVRw" title="Behind the Scenes" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <p class="text-lg leading-relaxed max-w-3xl mx-auto">Get an inside look at how our team collaborates, practices, and prepares each week. From warm-up sessions to studio takes, this is where the harmony begins — raw, real, and rhythmically driven.</p>
      </div>
    </section>

    <!-- Add Event (Questionnaire Form) -->
    <section id="add-event" class="py-24 px-6 md:px-12 text-white">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-4xl font-bold text-center gold-text mb-10" data-aos="fade-down">Add Your Event</h2>
        <form class="space-y-6 bg-[#181d3a] p-8 rounded-lg shadow-xl" data-aos="fade-up">
        <div>
            <label for="event-name" class="block mb-2 text-sm font-medium">Event Name</label>
            <input type="text" id="event-name" name="event-name" required class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <div>
            <label for="event-date" class="block mb-2 text-sm font-medium">Date</label>
            <input type="date" id="event-date" name="event-date" required class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Jam Mulai -->
        <div>
          <label for="start-time" class="block mb-2 text-sm font-medium text-white">Starts from</label>
          <input type="time" id="start-time" name="start-time" required
            class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Jam Selesai -->
        <div>
          <label for="end-time" class="block mb-2 text-sm font-medium text-white">Ends on</label>
          <input type="time" id="end-time" name="end-time" required
            class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <div>
            <label for="event-account" class="block mb-2 text-sm font-medium">Account</label>
              <input type="text" id="event-name" name="event-name" required class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <div>
            <label for="event-description" class="block mb-2 text-sm font-medium">Description</label>
            <textarea id="event-description" name="event-description" rows="4" required class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
        </div>

        <div>
            <label for="event-pic" class="block mb-2 text-sm font-medium">PIC</label>
              <input type="text" id="event-name" name="event-name" required class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <div>
            <label for="event-contact" class="block mb-2 text-sm font-medium">Contact Person</label>
              <input type="text" id="event-name" name="event-name" required class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <div>
            <label for="event-duration" class="block mb-2 text-sm font-medium">Duration</label>
              <input type="text" id="event-name" name="event-name" required class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <div>
            <label for="event-song" class="block mb-2 text-sm font-medium">Song</label>
            <textarea id="event-song" name="event-song" rows="4" required class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
        </div>

        <div>
            <label for="event-benefit" class="block mb-2 text-sm font-medium">Benefit</label>
            <textarea id="event-benefit" name="event-benefit" rows="4" required class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
        </div>

        <div>
            <label for="event-notes" class="block mb-2 text-sm font-medium">Extra Notes</label>
            <textarea id="event-notes" name="event-notes" rows="4" required class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
        </div>        
        
        <div>
            <label for="event-singer" class="block mb-2 text-sm font-medium">Singer</label>
            <select id="event-singer" name="event-singer" class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="more than 5">More than 5</option>
            </select>
        </div>

        <div>
            <label for="event-type" class="block mb-2 text-sm font-medium">Event Type</label>
            <select id="event-type" name="event-type" class="w-full px-4 py-2 rounded-md bg-[#0f132d] border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
            <option value="performance">Performance</option>
            <option value="workshop">Workshop</option>
            <option value="collaboration">Collaboration</option>
            <option value="other">Other</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-yellow-400 text-black font-semibold py-3 px-6 rounded-full hover:bg-yellow-300 hover:scale-105 transition-all duration-300 shadow-lg">
            Submit Event
        </button>
        </form>
    </div>
    </section>
  </section>

    <!-- FOOTER -->
    <footer id="contact" class="bg-black text-white py-12 text-center text-sm">
    <div class="max-w-5xl mx-auto px-6 space-y-10">

        <!-- Contact Us Info -->
        <div>
        <h3 class="text-2xl font-bold mb-6 text-yellow-400">Contact Us</h3>
        <div class="flex flex-col md:flex-row justify-center items-center gap-8 text-base">
            <!-- YouTube -->
            <a href="https://www.youtube.com/@yourchannel" target="_blank" class="hover:text-yellow-400 transition flex items-center gap-2">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M19.6 3H4.4C3.6 3 3 3.6 3 4.4v15.2c0 .8.6 1.4 1.4 1.4h15.2c.8 0 1.4-.6 1.4-1.4V4.4c0-.8-.6-1.4-1.4-1.4zM10 16V8l6 4-6 4z"/></svg>
            Vocal Group
            </a>

            <!-- Instagram -->
            <a href="https://www.instagram.com/yourprofile" target="_blank" class="hover:text-yellow-400 transition flex items-center gap-2">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10zm-5 3c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4zm6.5-.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM12 9c1.7 0 3 1.3 3 3s-1.3 3-3 3-3-1.3-3-3 1.3-3 3-3z"/></svg>
            @vocalgroup.pcu
            </a>

            <!-- WA / Line -->
            <div class="text-gray-300 text-sm leading-relaxed">
            <div><strong>WhatsApp:</strong> +62 812-3456-7890</div>
            <div><strong>LINE:</strong> @vocalgroup</div>
            </div>
        </div>
        </div>

        <!-- Footer Nav -->
        <div>
        <p>&copy; 2025 Vocal Group. All rights reserved.</p>
        <div class="mt-4 flex justify-center gap-6 text-gray-400">
            <a href="#events" class="hover:text-yellow-400 transition">Events</a>
            <a href="#services" class="hover:text-yellow-400 transition">Services</a>
            <a href="#bts" class="hover:text-yellow-400 transition">Behind the Scenes</a>
        </div>
        </div>

    </div>
    </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
    const swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      speed: 800,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        768: { slidesPerView: 1.5 },
        1024: { slidesPerView: 2 },
      },
    });
  </script>
</body>
</html>
