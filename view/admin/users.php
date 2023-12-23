    
<?php 

$resultUsers = getUsers();



?>
<!-- Content -->
<div class="flex-1 p-10 text-2xl font-bold">
    
    
    <div class="flex-1 p-10">
        <div class="flex gap-5 items-center relative">
            <h2 class="text-4xl font-bold mb-4">Users</h2>
            <!-- <div class="cursor-pointer bg-gray-700 flex flex-wrap content-center justify-center absolute px-2 py-2 right-0 rounded-md">
                <a href="./posts_add" class="text-sm text-white flex text-center"></a>
            </div> -->
        </div>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 divide-y divide-gray-200">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Phone</th>
                        <th class="px-6 py-3">Password</th>
                        <th class="px-6 py-3">Role</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Repeat this row for each post -->
                    <?php foreach($resultUsers as $user): ?>
                    <tr>
                        <td class="px-6 py-4">
                            <?php echo $user['id'] ?>
                        </td>
                        <td class="px-6 py-4 underline cusor-pointer">
                            <a href="<?php echo $url.'admin/users_edit/'.$user['id'] ?>"><?php echo $user['name'] ?></a>
                        </td>
                        <td class="px-6 py-4">
                            <p class="line-clamp-3 w-full h-full"><?php echo $user['email'] ?></p>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $user['phone'] ?>
                        </td>
                        <td class="px-6 py-4">  <?php echo $user['password'] ?></td>
                        <td class="px-6 py-4">
                            <?php echo $user['role'] ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>