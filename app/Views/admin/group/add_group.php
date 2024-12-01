<div class="w-full">


    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">
                        <div class="title-container flex items-center">
                            <h1 class="text-[#0957CB] font-semibold text-md py-4 h3">Thêm Group :</h1>
                        </div>
                        <form method="post" enctype="multipart/form-data" class="text-black">
                            <div class="grid md:grid-cols-2 grid-cols-1 md:gap-x-4 md:gap-y-0 gap-4">
                                <!-- Input Tên Group -->
                                <div class="w-full flex flex-col py-2 ">
                                    <label for="title" class="text-black font-semibold pb-1 capitalize">Tên
                                        Group</label>
                                    <input type="text" id="title" class="p-2 border border-[#a5abb5] rounded"
                                        name="name">
                                </div>
                                <div class="w-full flex flex-col py-2">
                                    <label for="addressDetail" class="text-black  font-semibold pb-1 capitalize">Địa
                                        chỉ chi tiết</label>
                                    <input name="address" id="addressDetail" type="text" placeholder="Địa chỉ chi tiết"
                                        class="w-full p-2  border border-[#E8F0FC] rounded" />
                                </div>




                            </div>




                            <div class="w-full flex justify-end">
                                <input name="submit" type="submit"
                                    class="hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-3 text-sm font-semibold"
                                    value="Thêm Group">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>