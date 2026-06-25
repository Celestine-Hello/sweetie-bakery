<style>
    .sweetie-music-player {
        position: fixed;
        right: 18px;
        top: 82px;
        z-index: 1080;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px;
        border-radius: 999px;
        background: rgba(255, 250, 245, 0.94);
        border: 1px solid rgba(212, 163, 115, 0.45);
        box-shadow: 0 10px 28px rgba(87, 57, 36, 0.18);
        backdrop-filter: blur(8px);
        animation: sweetieMusicIn 0.42s ease both;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .sweetie-music-player:hover,
    .sweetie-music-player:focus-within {
        transform: translateY(-2px);
        box-shadow: 0 14px 32px rgba(87, 57, 36, 0.22);
    }
    .sweetie-music-player select {
        width: 156px;
        border: 0;
        border-radius: 999px;
        padding: 8px 34px 8px 12px;
        color: #7a4f2d;
        background-color: #fff;
        font-size: 0.84rem;
        box-shadow: inset 0 0 0 1px rgba(212, 163, 115, 0.28);
        transition: transform 0.18s ease, box-shadow 0.18s ease, background-color 0.18s ease;
    }
    .sweetie-music-player select:hover {
        transform: scale(1.02);
        background-color: #fffdfb;
    }
    .sweetie-music-player select:focus {
        outline: none;
        box-shadow: inset 0 0 0 2px rgba(212, 163, 115, 0.72);
        animation: sweetieSelectPulse 0.36s ease;
    }
    .sweetie-music-toggle {
        width: 38px;
        height: 38px;
        border: 0;
        border-radius: 50%;
        color: #fff;
        background: #d4a373;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 auto;
    }
    .sweetie-music-toggle:hover {
        background: #bd8757;
    }
    .sweetie-music-player.is-playing .sweetie-music-toggle {
        animation: sweetieBeat 1.5s ease-in-out infinite;
    }
    .sweetie-music-status {
        position: absolute;
        right: 12px;
        top: 52px;
        max-width: 220px;
        padding: 7px 10px;
        border-radius: 12px;
        color: #7a4f2d;
        background: rgba(255, 255, 255, 0.92);
        box-shadow: 0 8px 20px rgba(87, 57, 36, 0.12);
        font-size: 0.75rem;
        opacity: 0;
        transform: translateY(-6px);
        pointer-events: none;
        transition: opacity 0.2s ease, transform 0.2s ease;
    }
    .sweetie-music-status.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    @keyframes sweetieMusicIn {
        from {
            opacity: 0;
            transform: translateY(-12px) scale(0.96);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    @keyframes sweetieSelectPulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.035); }
        100% { transform: scale(1); }
    }
    @keyframes sweetieBeat {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.08); }
    }
    @media (max-width: 575px) {
        .sweetie-music-player {
            right: 10px;
            top: 72px;
            left: 10px;
            justify-content: center;
        }
        .sweetie-music-player select {
            width: min(100%, 230px);
        }
    }
</style>

<div class="sweetie-music-player" aria-label="Pemutar lagu Sweetie Bakery">
    <button class="sweetie-music-toggle" id="sweetieMusicToggle" type="button" aria-label="Putar musik">
        <i class="fas fa-play" id="sweetieMusicIcon" aria-hidden="true"></i>
    </button>
    <select id="sweetieMusicSelect" aria-label="Pilih lagu">
        <option value="/assets/audio/Avanti%20-%20Time.mp3">Avanti - Time</option>
        <option value="/assets/audio/Calima%20-%20Dreaming.mp3">Calima - Dreaming</option>
        <option value="/assets/audio/Nebulite%20-%20Kyoto.mp3">Nebulite - Kyoto</option>
        <option value="/assets/audio/Spiring%20-%20City%20Life.mp3">Spiring - City Life</option>
    </select>
    <div class="sweetie-music-status" id="sweetieMusicStatus">Klik play untuk mulai musik.</div>
</div>
<audio id="sweetieMusicAudio" preload="auto" loop></audio>

<script>
    (function () {
        const audio = document.getElementById('sweetieMusicAudio');
        const player = document.querySelector('.sweetie-music-player');
        const select = document.getElementById('sweetieMusicSelect');
        const toggle = document.getElementById('sweetieMusicToggle');
        const icon = document.getElementById('sweetieMusicIcon');
        const status = document.getElementById('sweetieMusicStatus');
        const storageKey = 'sweetieMusicState';
        let statusTimer;

        function getState() {
            try {
                return JSON.parse(localStorage.getItem(storageKey)) || {};
            } catch (error) {
                return {};
            }
        }

        function setState(nextState) {
            const state = Object.assign(getState(), nextState);
            localStorage.setItem(storageKey, JSON.stringify(state));
        }

        function showStatus(message) {
            status.textContent = message;
            status.classList.add('is-visible');
            clearTimeout(statusTimer);
            statusTimer = setTimeout(function () {
                status.classList.remove('is-visible');
            }, 2400);
        }

        function updateIcon(isPlaying) {
            icon.className = isPlaying ? 'fas fa-pause' : 'fas fa-play';
            toggle.setAttribute('aria-label', isPlaying ? 'Jeda musik' : 'Putar musik');
            player.classList.toggle('is-playing', isPlaying);
        }

        function saveProgress() {
            setState({
                src: select.value,
                time: audio.currentTime || 0,
                playing: !audio.paused
            });
        }

        function restoreTime(time) {
            if (time && Number.isFinite(time) && time > 0) {
                const safeTime = Math.min(time, audio.duration || time);
                try {
                    audio.currentTime = safeTime;
                } catch (e) {
                    // ignore seek errors
                }
            }
        }

        function setTrack(src, time) {
            audio.src = src;
            select.value = src;

            function onReady() {
                restoreTime(time);
            }

            // If already loaded (cached), restore immediately
            if (audio.readyState >= 2) {
                onReady();
            } else {
                // Wait until audio is ready to seek
                audio.addEventListener('canplay', function onCanPlay() {
                    audio.removeEventListener('canplay', onCanPlay);
                    onReady();
                });
            }
        }

        function playMusic() {
            audio.play().then(function () {
                updateIcon(true);
                setState({ playing: true });
            }).catch(function () {
                updateIcon(false);
                setState({ playing: true });
                showStatus('Klik play untuk melanjutkan musik.');
            });
        }

        // ── Restore state on every page load ───────────────────────
        const state = getState();
        const initialSrc = state.src || select.options[0].value;
        select.value = initialSrc;
        audio.src = initialSrc;
        updateIcon(false);

        // If we have a saved time, restore it when audio is ready
        if (state.time && state.time > 0) {
            if (audio.readyState >= 2) {
                restoreTime(state.time);
            } else {
                audio.addEventListener('canplay', function handler() {
                    audio.removeEventListener('canplay', handler);
                    restoreTime(state.time);
                });
            }
        }

        // Only auto-play if it was playing before navigation
        if (state.playing) {
            playMusic();
        } else {
            showStatus('Pilih lagu lalu klik play.');
        }

        toggle.addEventListener('click', function () {
            if (audio.paused) {
                playMusic();
            } else {
                audio.pause();
                updateIcon(false);
                saveProgress();
            }
        });

        select.addEventListener('change', function () {
            const wasPlaying = !audio.paused;
            setTrack(select.value, 0);
            setState({ src: select.value, time: 0, playing: wasPlaying });
            if (wasPlaying) {
                playMusic();
            }
        });

        audio.addEventListener('play', function () {
            updateIcon(true);
            setState({ playing: true });
        });

        audio.addEventListener('pause', function () {
            updateIcon(false);
            saveProgress();
        });

        // Save every second (more precise than every 3 sec)
        audio.addEventListener('timeupdate', function () {
            const now = Math.floor(audio.currentTime);
            const lastSaved = getState().lastSavedTime || -1;
            if (now !== lastSaved) {
                setState({ time: audio.currentTime, lastSavedTime: now });
            }
        });

        // Save before leaving page
        window.addEventListener('pagehide', saveProgress);
        window.addEventListener('beforeunload', saveProgress);
        document.addEventListener('visibilitychange', function () {
            if (document.visibilityState === 'hidden') {
                saveProgress();
            }
        });
    })();
</script>
