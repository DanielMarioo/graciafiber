<!-- filepath: c:\laragon\www\FiberGlass\resources\views\components\products.blade.php -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="d-none d-md-block">
    <path fill="#3D405B" fill-opacity="1"
        d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
    </path>
</svg>

<section class="product-section section-padding" id="section_3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center mx-auto mb-lg-5 mb-4">
                <h2>Contoh Produk</h2>
            </div>

            <div class="col-lg-12 col-12">
                <div class="row" id="product-gallery">
                    @php
                    $products = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 
                             'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X'];
                    $perPage = 12;
                    $currentPage = request('page', 1);
                    $start = ($currentPage - 1) * $perPage;
                    @endphp
                    
                    @forelse(array_slice($products, $start, $perPage) as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-3 mb-lg-4">
                        <div class="product-card h-100 overflow-hidden rounded-3 shadow-lg" 
                        style="transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer;">
                            <div class="product-image-wrapper position-relative" 
                                style="height: auto; aspect-ratio: 1; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                <img src="{{ asset('images/produk/' . $product . '.jpg') }}" 
                                class="img-fluid" alt="Produk {{ $product }}"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease; cursor: pointer;" 
                                onclick="openModal('{{ asset('images/produk/' . $product . '.jpg') }}')">
                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-end justify-content-center pb-2 pb-lg-3"
                                style="background: rgba(0,0,0,0); transition: background 0.3s ease; pointer-events: none;">
                                    <span class="badge bg-primary" style="font-size: 11px;">Contoh {{ $product }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Tidak ada produk untuk ditampilkan</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="row mt-4 mt-lg-5">
                    <div class="col-12 d-flex justify-content-center overflow-auto">
                        <nav aria-label="Page navigation">
                            <ul class="pagination flex-wrap">
                            @php
                                $totalProducts = count($products);
                                $totalPages = ceil($totalProducts / $perPage);
                            @endphp
                            
                            <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="?page={{ $currentPage - 1 }}#section_3">Sebelumnya</a>
                            </li>
                            
                            @for ($i = 1; $i <= $totalPages; $i++)
                                <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                <a class="page-link" href="?page={{ $i }}#section_3">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                                <a class="page-link" href="?page={{ $currentPage + 1 }}#section_3">Sesudahnya</a>
                            </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .product-card {
        border: none;
        background: #fff;
    }
    
    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.15) !important;
    }
    
    .product-card:hover .product-image-wrapper img {
        transform: scale(1.05);
    }
    
    .product-image-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .pagination {
        gap: 4px;
    }

    .pagination .page-link {
        border: 2px solid #667eea;
        color: #667eea;
        transition: all 0.3s ease;
        margin: 2px;
        padding: 6px 10px;
        font-size: 12px;
        border-radius: 5px;
    }
    
    .pagination .page-item.active .page-link {
        background-color: #667eea;
        border-color: #667eea;
        color: white;
    }
    
    .pagination .page-link:hover:not(.disabled) {
        background-color: #667eea;
        border-color: #667eea;
        color: white;
    }

    @media screen and (max-width: 768px) {
        .pagination .page-link {
            padding: 5px 8px;
            font-size: 11px;
            margin: 1px;
        }
    }

    @media screen and (max-width: 480px) {
        .pagination .page-link {
            padding: 4px 6px;
            font-size: 10px;
            margin: 1px;
        }

        .product-image-wrapper {
            height: 150px !important;
        }
    }
</style>

<!-- Modal for Product Image -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down" style="max-width: 90vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Gambar Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 85vh; overflow-y: auto; display: flex; align-items: flex-start; justify-content: center;">
                <img id="modalImage" src="" class="img-fluid" alt="Produk" style="max-width: 100%; max-height: 100%;" />
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        var modal = new bootstrap.Modal(document.getElementById('productModal'));
        modal.show();
    }
</script>