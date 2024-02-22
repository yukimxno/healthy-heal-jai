<?php
    session_start();
    include "./includes/head.php";
    include "./includes/navbar.php";

?>
    <div class="flex bg-white overflow-hidden">
        <!-- First 3 parts with equal width -->
        <div class="w-1/3 h-72 flex items-center justify-center">
            <a href="contents/kidney.php">
                <img src="image/icon/kidney.png" alt="Image 1" class="max-w-full max-h-full transform transition-transform hover:translate-x-4 hover:translate-y-4">
            </a>
        </div>
        <div class="w-1/3 h-72 flex items-center justify-center">
            <a href="contents/heart.php">
                <img src="image/icon/heart_test.png" alt="Image 2" class="object-scale-down h-72 w-96 transform transition-transform hover:translate-y-4">
            </a>
        </div>
        <div class="w-1/3 h-72 flex items-center justify-center">
            <a href="contents/pressure.php">
                <img src="image/icon/new_pressure.png" alt="Image 3" class="object-scale-down h-72 w-96 transform transition-transform hover:-translate-x-4 hover:translate-y-4">
            </a>
        </div>
    </div>
    <div class="flex bg-white">
        <!-- Last 2 parts with equal width -->
        <div class="w-1/2 h-72 flex items-center justify-center">
            <a href="contents/diabetes.php">
                <img src="image/icon/diabetes.png" alt="Image 4" class="max-w-full max-h-full transform transition-transform hover:translate-x-4 hover:-translate-y-4">
            </a>
        </div>
        <div class="w-1/2 h-72 flex items-center justify-center">
        <a href="contents/liver.php">
            <img src="image/icon/liver_test.png" alt="Image 5" class="object-scale-down h-64 w-96 transform transition-transform hover:-translate-x-4 hover:-transform-y-4">
        </a>
        </div>
    </div>
</body>
</html>
