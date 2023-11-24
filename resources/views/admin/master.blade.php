<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Greyscape Architects | @yield('title')</title>
    <!-- vendor css -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('css/starlight.css') }}">

</head>

<body>
    @include('admin.layouts.sidebar')
    @include('admin.layouts.header')
    @yield('content')

    <script src="{{ asset('lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('lib/d3/d3.js') }}"></script>
    <script src="{{ asset('lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('lib/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('lib/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('lib/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('lib/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('lib/flot-spline/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('lib/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        function deleteConfirmation(id) {
            swal.fire({
                title: "Delete?",
                icon: 'question',
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, Restore it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {

                    let token = $('meta[name="csrf-token"]').attr('content');


                    $.ajax({
                        type: 'DELETE',
                        url: "projectimage/" + id,
                        data: {
                            "id": id,
                            "_token": '{!! csrf_token() !!}',
                        },
                        // data: {_token: token},
                        success: function(resp) {
                            if (resp.success) {
                                swal.fire("Done!", resp.success, "success");
                                // swal({ title: "Deleted!", text: "fdgdsgdfgsdf", type: "success" }, 
                                location.reload();





                            } else {
                                swal.fire("Error!", 'Sumething went wrong.', "error");
                            }
                        },
                        error: function(resp) {
                            swal.fire("Error!", 'Sumething went wrong.', "error");
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            })
        }
    </script>

    <script>
        $('.show_confirmimage').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <script>
        $('.show_confirmslide').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <script>
        $('.show_confirmcat').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <script>
        $(function() {
            'use strict';
            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });
            $('#datatable2').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: true
            });
            // Select2
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });
        });
    </script>


    <script>
        function updatePosition(id, position) {
            // Make an AJAX request to update the status in the backend database
            // var newPosition = $("input[name='position']:checked").val();
            $.ajax({
                url: '/update-position/' + id,
                type: 'POST',
                data: {
                    position: position,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                }
            });
        }
    </script>

    <script>
        function updateStatus(id, status) {
            // Make an AJAX request to update the status in the backend database
            // var newPosition = $("input[name='position']:checked").val();
            $.ajax({
                url: '/update-status/' + id,
                type: 'POST',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    location.reload();
                    // console.log($slider);
                },
                error: function(xhr, status, error) {
                    // Handle error response
                }
            });
        }
    </script>

    <!-- <script>
function updatePosition(id, position) {
    var token = '{{ csrf_token() }}';
    var url = '/update-position/' + id;
    var data = {
        _token: token,
        position: position,
    };
    $.post(url, data, function(result) {
        // Update the label text based on the new position value
        if (result.position == 0) {
            $('#inlineRadio' + id).prop('checked', true);
            $('#inlineRadio' + id + ' + label').text('First');
        } else {
            $('#inlineRadio' + id).prop('checked', false);
            $('#inlineRadio' + id + ' + label').text('Default');
        }
    });
}
</script> -->

    <script src="{{ asset('js/starlight.js') }}"></script>
    <script src="{{ asset('js/ResizeSensor.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Yesterday', 'Today', 'This Month', 'This Year','Total'],
        datasets: [{
            label: 'Graph of Visitors',
            data: [{{$yesterday_visitor}}, {{$today_visitor}}, {{$month_visitor}}, {{$year_visitor}},{{$total_visitor}}],
           
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    callback: function(value, index, values) {
          return value.toLocaleString();
        }
                }
            }]
        }
    }
});
</script>


</body>

</html>