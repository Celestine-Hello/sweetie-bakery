<style>
    .sweetie-music-player {
        position: fixed;
        right: 18px;
        bottom: 18px;
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
    }
    .sweetie-music-player select:focus {
        outline: none;
        box-shadow: inset 0 0 0 2px rgba(212, 163, 115, 0.72);
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
    .sweetie-music-status {
        position: absolute;
        right: 12px;
        bottom: 52px;
        max-width: 220px;
        padding: 7px 10px;
        border-radius: 12px;
        color: #7a4f2d;
        background: rgba(255, 255, 255, 0.92);
        box-shadow: 0 8px 20px rgba(87, 57, 36, 0.12);
        font-size: 0.75rem;
        opacity: 0;
        transform: translateY(6px);
        pointer-events: none;
        transition: opacity 0.2s ease, transform 0.2s ease;
    }
    .sweetie-music-status.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    @media (max-width: 575px) {
        .sweetie-music-player {
            right: 10px;
            bottom: 10px;
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
        }

        function saveProgress() {
            setState({
                src: select.value,
                time: audio.currentTime || 0,
                playing: !audio.paused
            });
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

        function setTrack(src, time) {
            audio.src = src;
            select.value = src;
            audio.addEventListener('loadedmetadata', function restoreTime() {
                audio.removeEventListener('loadedmetadata', restoreTime);
                if (time && Number.isFinite(time)) {
                    audio.currentTime = Math.min(time, audio.duration || time);
                }
            });
        }

        const state = getState();
        const initialSrc = state.src || select.options[0].value;
        setTrack(initialSrc, state.time || 0);
        updateIcon(false);

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
            const shouldPlay = !audio.paused;
            setTrack(select.value, 0);
            setState({ src: select.value, time: 0, playing: shouldPlay });
            if (shouldPlay) {
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

        audio.addEventListener('timeupdate', function () {
            if (Math.floor(audio.currentTime) % 3 === 0) {
                saveProgress();
            }
        });

        window.addEventListener('pagehide', saveProgress);
        window.addEventListener('beforeunload', saveProgress);
    })();
</script>
