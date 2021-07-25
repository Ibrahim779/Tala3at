@section('script')
    <script>
        $('#governorate-select').change(function () {
            let governorateId = $(this).val();
            $("#city-select").empty();
            $.ajax({
                url : '{{url('admin/governorates')}}/' + governorateId +'/cities',
                type: 'get',
                success: function (data) {
                    $.each((data).data, function (key, city) {
                        let option = $('<option></option>').attr("value", city.id).text(city.name);
                        $("#city-select").append(option);
                    });
                }
            });
        });
    </script>
@endsection
