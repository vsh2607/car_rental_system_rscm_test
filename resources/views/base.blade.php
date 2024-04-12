@section('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {

            new DataTable('#customer-table');
            new DataTable("#car-table");
            $('.select2').select2();
        });

        $(".btn-return").on("click", function() {
            var carBrand = $(this).closest("tr").find("td").eq(1).text();
            var customer = $(this).closest("tr").find("td").eq(2).text();
            var totalPrice = $(this).closest("tr").find("td").eq(5).data("data1");
            var rentId = $(this).closest("tr").find("td").eq(5).data("data2");
            console.log(carBrand);

            Swal.fire({
                title: 'Return Confirmation',
                html: `<table class="table"><thead><tr><th>Customer Name</th><th>Rented Car</th><th>Total Price</th></tr></thead><tbody><tr><td>${carBrand}</td><td>${customer}</td><td>${totalPrice}</td></tr></tbody></table>`,
                icon: 'question',
                confirmButtonText: "Confirm"

            }).then((result) => {
                window.location.href = window.location.href +   `/${rentId}`;
            });
        })

        $(".dt").on("change", function() {
            var startDate = new Date($(".rent_start_date").val());
            var endDate = new Date($(".rent_return_date").val());


            var timeDifference = endDate.getTime() - startDate.getTime();

            var daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));

            if (isNaN(daysDifference) || daysDifference < 0) {

                daysDifference = 0;
            }

            $(".rent_total_price").val(daysDifference * parseFloat($(".rent_car_price").val()));



        })

        $(".btn-pick").on('click', function() {
            $(".rent-available").removeClass("col-12").addClass("col-8");
            $(".rent-column").css("display", "");
            var carBrand = $(this).closest("tr").find("td").eq(1).text();
            var carId = $(this).closest("tr").find("td").eq(1).data("data1");
            var carPrice = $(this).closest("tr").find("td").eq(3).data("data1");
            $(".rent_car_brand").val(carBrand);
            $(".rent_car_id").val(carId);
            $(".rent_car_price").val(carPrice);



            var startDate = new Date($(".rent_start_date").val());
            var endDate = new Date($(".rent_return_date").val());

            var timeDifference = endDate.getTime() - startDate.getTime();

            var daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));

            if (isNaN(daysDifference) || daysDifference < 0) {

                daysDifference = 0;
            }

            $(".rent_total_price").val(daysDifference * parseFloat($(".rent_car_price").val()));




        });
    </script>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.com/libraries/select2-bootstrap-css">
@endsection
