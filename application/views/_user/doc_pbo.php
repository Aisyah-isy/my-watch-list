<body>
    <div class="main-content container">
        <h1 >Dokumentasi Program Audio Player</h1>

        <h3 class="mt-4">Pendahuluan</h3>
        <p>Program ini adalah program sederhana yang memanfaatkan library javax.sound.sampled untuk memutar file audio dengan format WAV. Program ini berisi beberapa metode utama seperti
            loadAudio, play, dan stop, yang masing-masing berfungsi untuk memuat file audio, memutar audio, dan menghentikan pemutaran</p>

        <h3 class="mt-4">Pengaturan Proyek</h3>
        <ol>
            <li>Buka NetBeans IDE.</li>
            <li>Pilih File -> New Project.</li>
            <li>Pilih kategori Java dan jenis proyek Java Application. Klik Next.</li>
            <li>Masukkan nama proyek, misalnya WAVAudioPlayer. Tentukan lokasi proyek sesuai keinginan Anda. Klik Finish.</li>
            <li>Pastikan anda sudah memiliki file audio dengan format WAV di sistem anda.</li>
        </ol>
        <h3 class="mt-4">Penjelasan Code</h3>
        <p>Program ini memiliki beberapa metode utama untuk menjalankan program, yaitu:</p>
        <ul>
            <li><code class="java">public void loadAudio(String audioFilePath) {}</code></li>
            <p> Berfungsi untuk memuat file audio dari path yang diberikan oleh pengguna. Pastikan path file yang Anda masukkan adalah benar.</p>
            <li><code class="java">public void play() {}</code></li>
            <p> Berfungsi untuk memutar file audio yang telah dimuat sebelumnya.</p>
            <li><code class="java">public void stop() {}</code></li>
            <p> Berfungsi untuk menghentikan pemutaran audio yang sedang berlangsung.</p>

        </ul>

        <h3 class="mt-4">Menjalankan Program</h3>
        <ol>
            <li>Pastikan path file audio yang ingin diputar telah disesuaikan dengan path file yang ada di sistem Anda.</li>
            <li>Di panel Projects, klik kanan pada file WAVAudioPlayer.java.</li>
            <li>Pilih Run File untuk menjalankan program.</li>
            <li>Program akan memuat dan memutar file WAV yang Anda tentukan di path file.</li>
            <li>Klik Play button untuk memutar audio dan stop button untuk menghentikan pemutaran</li>
        </ol>

        <h3 class="mt-4"> Code :</h3>
        <pre><code class="java">[code here]</code></pre>
		<div class="col-md-12">
			<h3>Dokumentasi Program</h3>
			<div class="video-wrapper">
				<img src="" alt="" srcset="">
			</div>
		</div>
    </div>
</body>

</html>