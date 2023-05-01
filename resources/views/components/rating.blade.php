<script>
    window.onload = function onLoad() {
        var bar = new ProgressBar.Circle('{{ $id }}', {
            color: 'gray',
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
                color: '#F2CD5C',
                width: 7
            },
            to: {
                color: '#F2CD5C',
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
    }
</script>

<script>
    window.ProgressBar = new ProgressBar.Circle(container, {
        color: '#aaa',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 4,
        trailWidth: 1,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: false
        },
        from: {
            color: '#aaa',
            width: 1
        },
        to: {
            color: '#333',
            width: 4
        },
        // Set default step function for all animate calls
        step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
                circle.setText('');
            } else {
                circle.setText(value);
            }

        }
    });

    ProgressBar.animate({{ $rating }} / 100);
</script>
