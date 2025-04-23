document.getElementById("searchForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Ngừng hành động mặc định của form

    const studentId = document.getElementById("studentId").value;
    const examYear = document.getElementById("examYear").value;
    const resultDiv = document.getElementById("result");

    // Kiểm tra nếu người dùng đã nhập đủ thông tin
    if (!studentId || !examYear) {
        resultDiv.innerHTML = "<p style='color: red;'>Vui lòng nhập đầy đủ thông tin.</p>";
        return;
    }

    // Gửi yêu cầu đến API hoặc PHP backend
    fetch(`tra_cuu.php?studentId=${studentId}&examYear=${examYear}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                // Hiển thị kết quả nếu thành công
                resultDiv.innerHTML = `
                    <h3>Điểm thi của thí sinh ${studentId} năm ${examYear}:</h3>
                    <p>Điểm Toán: ${data.toan}</p>
                    <p>Điểm Lý: ${data.ly}</p>
                    <p>Điểm Hóa: ${data.hoa}</p>
                `;
            } else {
                // Hiển thị thông báo lỗi
                resultDiv.innerHTML = `<p style="color: red;">${data.message}</p>`;
            }
        })
        .catch(error => {
            resultDiv.innerHTML = `<p style="color: red;">Đã xảy ra lỗi: ${error}</p>`;
        });
});
