<?php
// Kiểm tra nếu có thông tin mã số thí sinh và năm thi
if (isset($_GET['studentId']) && isset($_GET['examYear'])) {
    $studentId = $_GET['studentId'];
    $examYear = $_GET['examYear'];

    // Mô phỏng kết quả điểm thi (bạn cần thay thế phần này với logic thực tế của API hoặc cơ sở dữ liệu)
    $mockResult = [
        'toan' => 8.5,
        'ly' => 7.0,
        'hoa' => 6.5,
    ];

    // Kiểm tra dữ liệu
    if ($studentId === '123456789' && $examYear == 2023) {
        // Trả về kết quả dưới dạng JSON
        echo json_encode([
            'status' => 'success',
            'toan' => $mockResult['toan'],
            'ly' => $mockResult['ly'],
            'hoa' => $mockResult['hoa']
        ]);
    } else {
        // Trả về lỗi nếu không tìm thấy dữ liệu
        echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy điểm thi cho mã số thí sinh này.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Mã số thí sinh hoặc năm thi không hợp lệ.']);
}
?>
