@extends('layout.master')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>My Cart</h1>
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item text-decoration-none"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/menu">Menu</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">My Cart</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="{{ asset('assets/images/logo/logo.png') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- hero end --}}

    {{-- menu --}}
    <div class="container-xxl py-5">
        <div class="container">
                    <table id="cart" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    <tr rowId="{{ $id }}">
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs"><img
                                                        src="{{ asset('/storage/gambar/' . $details['gambar']) }}"
                                                        class="card-img-top" />
                                                </div>
                                                <div class="col-sm-9">
                                                    <h4 class="nomargin">{{ $details['nama_item'] }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">Rp {{ $details['harga'] }}</td>

                                        <td data-th="Subtotal" class="text-center">Rp <span class="subtotal">{{ $details['harga'] }}</span></td>
                                        <td class="actions">
                                            <button class="btn btn-outline-danger btn-sm delete-product"><i class="fa fa-trash-o"></i> Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-right">
                                    <a href="{{ url('/menu') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i>
                                        Continue
                                        Shopping</a>
                                    <button class="btn btn-danger" type="submit">Checkout</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        // Menghitung total harga belanjaan dan menampilkannya
        function calculateTotal() {
            var total = 0;
            $('.subtotal').each(function() {
                total += parseInt($(this).text().replace('Rp ', '').replace(',', ''));
            });
            $('.total-price').text('Rp ' + total.toLocaleString());
        }

        $(document).ready(function() {
            // Memperbarui total saat dokumen siap
            calculateTotal();

            // Memperbarui total saat ada perubahan pada keranjang belanja
            $(".edit-cart-info").change(function(e) {
                e.preventDefault();
                var ele = $(this);
                $.ajax({
                    url: '{{ route('update.shopping.cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("rowId"),
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });

            // Menghapus produk dari keranjang belanja
            $(".delete-product").click(function(e) {
                e.preventDefault();
                var ele = $(this);
                if (confirm("Do you really want to delete?")) {
                    $.ajax({
                        url: '{{ route('delete.cart.item') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("rowId")
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>

@endsection