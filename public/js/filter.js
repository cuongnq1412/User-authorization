document.addEventListener("DOMContentLoaded", function() {
    const titleCategory = document.querySelectorAll('.title_category');
    let selectedProducts = [];
    let selectedCategory = [];
    const products = document.querySelectorAll('.product-item');
    products.forEach(products => {
        selectedProducts.push(products);
    });
    // Lắng nghe sự kiện click trên các title_category
    titleCategory.forEach(function(element) {
        element.addEventListener('click', function() {
            const title = element.textContent.trim();
            const index = selectedCategory.indexOf(title);
            if (index === -1) {
                selectedCategory.push(title);
            } else {
                selectedCategory.splice(index, 1);
            }

            // Lọc sản phẩm dựa trên selectedCategory
            selectedProducts = [];
            products.forEach(function(product) {
                const categoryTitle = product.querySelector('.category_title').textContent.trim();
                if (selectedCategory.includes(categoryTitle)) {
                    selectedProducts.push(product);
                }
            });

            // Cập nhật số lượng trang và hiển thị sản phẩm
            updatePagination();
        });
    });

    // Hiển thị sản phẩm trên từng trang
    function showPage(pageNumber) {
        const productsPerPage = 12;
        const startIndex = (pageNumber - 1) * productsPerPage;
        const endIndex = Math.min(startIndex + productsPerPage, selectedProducts.length);

        // Ẩn tất cả các sản phẩm trước khi hiển thị trang mới
        products.forEach(function(product) {
            product.style.display = 'none';
        });

        // Hiển thị sản phẩm trong phạm vi trang hiện tại
        for (let i = startIndex; i < endIndex; i++) {
            selectedProducts[i].style.display = 'block';
        }
    }

    // Tạo các nút phân trang
    function createPagination() {
        const pagination = document.getElementById('pagination');
        const ul = pagination.querySelector('ul');
        const numPages = Math.ceil(selectedProducts.length / 12); // Tính toán số trang

        // Xóa nút phân trang cũ
        ul.innerHTML = '';

        // Tạo nút "Previous"
        const prevPageItem = document.createElement('li');
        prevPageItem.classList.add('page-item');
        const prevPageLink = document.createElement('a');
        prevPageLink.classList.add('page-link');
        prevPageLink.innerHTML = '<i class="icon-long-arrow-left"></i>Previous';
        prevPageLink.href = '#';
        prevPageLink.addEventListener('click', function(event) {
            event.preventDefault();
            const currentPage = document.querySelector('.pagination .active');
            let pageNumber = parseInt(currentPage.textContent);
            console.log(currentPage.textContent);
            if (pageNumber > 1) {
                showPage(pageNumber - 1);
                currentPage.classList.remove('active');
                currentPage.previousElementSibling.classList.add('active');
            }
        });
        prevPageItem.appendChild(prevPageLink);
        ul.appendChild(prevPageItem);

        // Tạo các nút phân trang mới
        for (let i = 1; i <= numPages; i++) {
            const li = document.createElement('li');
            li.classList.add('page-item');
            if (i === 1) {
                li.classList.add('active');
            }

            const a = document.createElement('a');
            a.classList.add('page-link');
            a.textContent = i;
            a.href = '#';
            a.addEventListener('click', function(event) {
                event.preventDefault();
                const currentPage = document.querySelector('.pagination .active');
                currentPage.classList.remove('active');
                li.classList.add('active');
                showPage(i);
            });

            li.appendChild(a);
            ul.appendChild(li);
        }
        // Tạo nút "Next"
        const nextPageItem = document.createElement('li');
        nextPageItem.classList.add('page-item');
        const nextPageLink = document.createElement('a');
        nextPageLink.classList.add('page-link');
        nextPageLink.innerHTML = 'Next<i class="icon-long-arrow-right"></i>';
        nextPageLink.href = '#';
        nextPageLink.addEventListener('click', function(event) {
            event.preventDefault();
            const currentPage = document.querySelector('.pagination .active');
            let pageNumber = parseInt(currentPage.textContent);
            console.log(currentPage.textContent);
            if (pageNumber < numPages) {
                showPage(pageNumber + 1);
                currentPage.classList.remove('active');
                currentPage.nextElementSibling.classList.add('active');
            }
        });
        nextPageItem.appendChild(nextPageLink);
        ul.appendChild(nextPageItem);
        if (document.querySelector('.pagination li:first-child').classList.contains('active')) {
            prevPageLink.classList.add('disabled');
        }

        // Disable nút "Next" nếu ở trang cuối cùng
        if (document.querySelector('.pagination li:last-child').classList.contains('active')) {
            nextPageLink.classList.add('disabled');
        }
        // Hiển thị phân trang
        pagination.style.display = 'block';
    }


    // Cập nhật số lượng trang và hiển thị sản phẩm
    function updatePagination() {
        if (selectedProducts.length === 0) {
            // Hiển thị tất cả sản phẩm
            products.forEach(function(product) {
                product.style.display = 'block';
            });

        } else {
            // Hiển thị sản phẩm trên từng trang
            showPage(1); // Hiển thị trang đầu tiên sau mỗi lần cập nhật
            createPagination(); // Tạo lại phân trang dựa trên số lượng sản phẩm đã lọc

            // Hiển thị phân trang nếu có sản phẩm được lựa chọn
            const pagination = document.getElementById('pagination');
            pagination.style.display = 'block';
        }
    }

    // Khởi tạo ban đầu
    updatePagination();
});