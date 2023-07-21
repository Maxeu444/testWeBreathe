var ctx = document.getElementById('myChart').getContext('2d');
        var data = {{ chart.data()|json_encode|raw }};
        var options = {{ chart.options()|json_encode|raw }};
        var myChart = new Chart(ctx, {
            type: '{{ chart.type() }}',
            data: data,
            options: options
        });