<p class="text-center text-gray-500 text-xs select-none">
    &copy;2024 Adam Corp. All rights reserved.
</p>
<?php
foreach ($scripts as $script) {
    echo "<script src='$script'></script>";
}