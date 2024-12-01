
function confirmDelete(url, id) {
    Swal.fire({
      title: "Bạn có chắc không?",
      text: "Bạn sẽ không thể khôi phục điều này!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Có, xóa nó!",
    }).then((result) => {
      if (result.isConfirmed) {
        // Gửi yêu cầu xóa đến máy chủ
        deleteItem(url, id);
      }
    });
  }
  
  function deleteItem(url, id) {
    // Sử dụng Fetch API để gửi yêu cầu xóa
    fetch(url + "?id=" + id, {
      method: "DELETE",
    })
      .then((response) => {
        if (response.ok) {
          // Nếu yêu cầu xóa thành công, hiển thị thông báo
          showDeleteSuccessMessage();
        } else {
          // Nếu có lỗi xảy ra, hiển thị thông báo lỗi
          Swal.fire({
            title: "Đã xảy ra lỗi!",
            icon: "error",
          });
        }
      })
      .catch((error) => {
        console.error("Lỗi:", error);
        // Hiển thị thông báo lỗi
        Swal.fire({
          title: "Đã xảy ra lỗi!",
          icon: "error",
        });
      });
  }
  
  function showDeleteSuccessMessage() {
    Swal.fire({
      title: "Xoá thành công!",
      icon: "success",
    }).then(() => {
      // Sau khi người dùng nhấn OK, load lại trang
      window.location.reload();
    });
  }
  
  function addItemSuccess(title) {
    Swal.fire({
      title: title + " thành công!",
      icon: "success",
    })
  }
  function addItemError() {
    Swal.fire({
      title: "Thất bại!",
      text: "Vui lòng điền đầy đủ thông tin!",
      icon: "error",
    });
  }