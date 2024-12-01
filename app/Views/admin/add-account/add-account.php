<div class="w-full">
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script> -->
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">
                        <div class="title-container flex items-center">
                            <h1 class="text-[#0957CB] font-semibold text-md py-4 h3">Thêm Thành Viên :</h1>
                        </div>
                        <form method="post" enctype="multipart/form-data" class="text-black">
                            <div class="grid md:grid-cols-2 grid-cols-1 md:gap-x-4 md:gap-y-0 gap-4">



                                <!-- CCCD -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="name" class="text-black font-semibold pb-1 capitalize">Họ Và Tên</label>
                                    <input type="text" id="cccd" class="p-2 border border-[#a5abb5] rounded"
                                        name="name">
                                </div>

                                <!-- Name -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="email" class="text-black font-semibold pb-1 capitalize">Email</label>
                                    <input type="email" id="name" class="p-2 border border-[#a5abb5] rounded"
                                        name="email">
                                </div>

                                <!-- Phone -->


                                <!-- Password -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="password" class="text-black font-semibold pb-1 capitalize">Mật
                                        khẩu</label>
                                    <input type="password" id="password" class="p-2 border border-[#a5abb5] rounded"
                                        name="password">
                                </div>


                                <!-- Status -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="status" class="text-black font-semibold pb-1 capitalize">Chức Vụ Quản
                                        Lý</label>
                                    <select id="status" class="p-2 border border-[#a5abb5] rounded" name="level">
                                        <option value="commune">Quản Trị Xã</option>
                                        <option value="district">Quản Trị Huyện</option>
                                        <option value="city">Quản Tỉnh</option>
                                    </select>
                                </div>



                                <!-- Created At -->

                            </div>


                            <div class="w-full flex justify-end">
                                <input name="submit" type="submit"
                                    class="hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-3 text-sm font-semibold"
                                    value="Thêm Tài Khoản">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>