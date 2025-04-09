const video = document.querySelector('.post__item-video');
        const playIcon = document.querySelector('.play-icon');
    
        // Обработчик события для запуска и остановки видео
        function toggleVideo() {
            if (video.paused) {
                video.play(); // Воспроизводим видео
                playIcon.style.display = 'none'; // Скрываем иконку
            } else {
                video.pause(); // Ставим видео на паузу
                playIcon.style.display = 'block'; // Показываем иконку
            }
        }
    
        // Связываем обработчик с видео
        video.addEventListener('click', toggleVideo);
    
        // Связываем обработчик с иконкой воспроизведения
        playIcon.addEventListener('click', toggleVideo);
    
        // Обработчик для изменения видимости иконки в зависимости от состояния видео
        video.addEventListener('play', function () {
            playIcon.style.display = 'none'; // Скрываем иконку при воспроизведении
        });
    
        video.addEventListener('pause', function () {
            playIcon.style.display = 'block'; // Показываем иконку, когда видео на паузе
        });