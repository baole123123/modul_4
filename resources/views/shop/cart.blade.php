@extends('shop.master')

@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Tên Hàng</th>
            <th style="width:10%">Giá</th>
            <th style="width:8%">Số lượng</th>
            <th style="width:22%" class="text-center">Tổng giá</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ number_format($details['price']) }} VNĐ</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ number_format($details['price'] * $details['quantity']) }} VNĐ</td>
                    <td class="actions" data-th="">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
                                    @if (session('successMessage'))
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: '<h6>{{ session('successMessage') }}</h6>',
                                            showConfirmButton: false,
                                            timer: 2000,
                                            width: '300px',
                                            customClass: {
                                                popup: 'animated bounce',
                                            },
                                            background: '#F4F4F4',
                                            iconColor: '#00A65A',
                                        });
                                    </script>

                                    @endif
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Tổng cộng {{ number_format($total) }} VNĐ</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
            <a href="javascript:history.back()" class="text-dark px-2"><i class="fa fa-angle-left"></i> Quay lại trang</a>
            <a href="http://127.0.0.1:8000/shop/checkOuts" class="btn btn-success">Thanh toán</a>
            </td>
        </tr>
    </tfoot>
</table>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('scripts')
<script type="text/javascript">

    $(".update-cart").change(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Bạn có chắc chắn muốn xóa ?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection
