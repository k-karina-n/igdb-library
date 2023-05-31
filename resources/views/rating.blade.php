<script>
    window.addEventListener('load', function() {
        var bar = new ProgressBar.Circle('{{ $id }}', {
            color: 'white',
            // This has to be the same size as the maximum width to
            // prevent clipping
            strokeWidth: 6,
            trailWidth: 3,
            easing: 'easeInOut',
            duration: 2500,
            text: {
                autoStyleContainer: false
            },
            from: {
                color: '#a855f7',
                width: 7
            },
            to: {
                color: '#ec4899',
                width: 7
            },
            // Set default step function for all animate calls
            step: function(state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);

                var value = Math.round(circle.value() * 100);
                if (value === 0) {
                    circle.setText('0%');
                } else {
                    circle.setText(value + '%');
                }

            }
        });

        bar.animate({{ $rating }} / 100);
    });
</script>
