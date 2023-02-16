<tr>
                                                <th class="table-info" scope="row">Hình Vị Trí</th>
                                                <td>
                                                    <form method="GET" action="upload.php" enctype="multipart/form-data">
                                                        <p><img src="<?php echo $listInfor[$i][3] ?>" alt=""></p>
                                                        <div id="wrapper"><input type="file" name="fileToUpload" value="" />
                                                            <input type="submit" name="submit" value="Upload " />
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="table-info" scope="row">Hình Sơ Đồ Tủ</th>
                                                <td>
                                                    <form method="GET" action="upload.php" enctype="multipart/form-data">
                                                        <p><img src="<?php echo $listInfor[$i][4] ?>" alt=""></p>
                                                        <div id="wrapper"><input type="file" name="fileToUpload" value="" />
                                                            <input type="submit" name="submit" value="Upload " />
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>