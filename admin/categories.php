<?php include 'header.php'; ?>

    <h1 class="text-3xl font-bold">Categories</h1>
    <hr class="my-3 h-1 bg-orange-500">

    <!-- Add Category Button  -->
    <div class="text-right my-5">
        <a href="createcategory.php" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Add Category</a>
    </div>

    <table class="w-full">
        <tr class="bg-gray-200">
            <th class="border p-2">Order</th>
            <th class="border p-2">Category Name</th>
            <th class="border p-2">Status</th>
            <th class="border p-2">Action</th>
        </tr>
        <tr class="text-center">
            <td class="border p-2">1</td>
            <td class="border p-2">Clothing</td>
            <td class="border p-2">Show</td>
            <td class="border p-2">
                <a href="" class="bg-blue-600 text-white px-4 mx-1 py-1 rounded">Edit</a>
                <a href="" class="bg-red-600 text-white px-4 mx-1 py-1 rounded">Delete</a>
            </td>
        </tr>

        
        
    </table>

<?php include 'footer.php'; ?>