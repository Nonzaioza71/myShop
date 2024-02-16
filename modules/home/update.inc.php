<?php
if (!array_key_exists('type', $_GET)) echo "<script>window.location.href = '?'</script>";

// echo "<pre>";
// print_r($permission);
// echo "</pre>";

$product = getProductByID($_GET);
$data = $product['data'][0];
$images = $product['images'];

checkAuthed(checkPerm($permission, 'product_update')); ?>

<div class="col-md-12">
    <h1 class="fw-bold fs-4">
        Update a <?= $data['product_name'] ?> product
    </h1>
    <div class="card shadow rounded-0 col-md-12 mt-3 p-3">
        <form method="post" onkeydown="return event.key != 'Enter';">
            <input type="hidden" name="action" value="insertProduct">
            <div class="col-md-12 row mb-3">

                <div class="form-group col-md-4">
                    <label for="product_name">Product Name <span class="text-danger">*</span></label>
                    <input required type="text" name="product_name" id="product_name" class="form-control" value="<?= $data['product_name'] ?>">
                </div>

                <div class="form-group col-md-4">
                    <label for="product_type">Product Type</label>
                    <!-- <pre><?php print_r($product_type_list) ?></pre> -->
                    <select class="form-select" name="product_type" id="product_type">
                        <?php foreach ($product_type_list as $idx => $item) { ?>
                            <option <?php if ($item['product_type_name'] == $data['product_type_name']) echo 'selected' ?> value="<?= $item['id'] ?>"><?= strtoupper($item['product_type_name']) ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="product_promotion">Product Promotion</label>
                    <!-- <pre><?php print_r($product_promotion_list) ?></pre> -->
                    <select class="form-select" name="product_promotion" id="product_promotion">
                        <?php foreach ($product_promotion_list as $idx => $item) { ?>
                            <option <?php if ($item['id'] == $data['product_promotion']) echo 'selected' ?> value="<?= $item['id'] ?>"><?= strtoupper($item['name']) ?></option>
                        <?php } ?>
                    </select>
                </div>

            </div>

            <div class="col-md-12 row mb-3">

                <div class="col-md-12">
                    <div class="col-md-12 d-flex row m-auto">
                        <div class="col-md-8">
                            <label for="product_detail">Product Description</label>
                            <textarea name="product_detail" id="product_detail" class="form-control" cols="30" rows="10" value="<?= $data['product_detail'] ?>"><?= $data['product_detail'] ?></textarea>
                        </div>
                        <div class="col-md-4 pe-0">
                            <div class="col-md-12 mb-3">
                                <label for="product_price">Product price</label>
                                <input class="form-control" step="0.25" min="0" oninput="if(this.value < 0) this.value = 0" value="<?= $data['product_price'] ?>" type="number" name="product_price" id="product_price">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="product_detail">Product tag</label>
                                <input type="search" class="form-control" id="tags">
                                <div class="col-md-12 border d-flex mt-5 p-2" id="tag_list"></div>
                            </div>

                            <input type="text" name="product_tags" id="product_tags" value="<?= $data['product_tags'] ?>">
                        </div>
                    </div>
                    <div class="col-md-12 d-flex row m-auto">
                        <div class="col-md-8">
                            <label for="product_iframe">Product Iframe link</label>
                            <input name="product_iframe" id="product_iframe" oninput="document.querySelector('#product_iframe_preview').src = this.value" class="form-control" value="<?= $data['product_iframe'] ?>" />
                        </div>
                        <div class="col-md-4 pe-0">
                            <label for="product_images">Product Images</label>
                            <input class="form-control" type="file" id="file_input" multiple>
                            <input type="text" name="product_images" id="product_images" value="[]">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="col-md-12 row">
                        <div class="col-md-6">
                            <p class="fs-5 fw-bold">Preview Images</p>
                            <div class="col-md-12 row" id="product_images_preview"></div>
                        </div>
                        <div class="col-md-6">
                            <p class="fs-5 fw-bold">Preview Iframe</p>
                            <div class="col-md-12 row">
                                <iframe id="product_iframe_preview" class="w-full" style="height: 40vh;" title="Low Poly Knight" frameborder="0" mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="<?= $data['product_iframe'] ?>"> </iframe>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="d-flex justify-content-end">
                <button class="rounded-lg border bg-green-400 text-black hover:bg-green-500 hover:shadow p-2 ps-4 pe-4" type="submit">Add Product</button>
            </div>
        </form>
    </div>
</div>

<script>
    let availableTags = [
        <?php foreach ($product_tags_list as $idx => $item) {
            echo '"' . $item['tag_name'] . '",';
        } ?>
    ]

    window.addEventListener("load", () => {
        document.querySelector('#banner').remove()
        loadSuccess(false);
    })

    $(function() {
        $("#tags").autocomplete({
            source: availableTags
        });
    });

    document.querySelector("#tags").addEventListener("keyup", e => {
        // console.log(e);
        const _val = document.querySelector("#tags").value
        const list = document.querySelector('#product_tags').value
        if (_val.length > 0) {
            if (e.key === "Enter") {
                const newTag = document.createElement("div")
                newTag.setAttribute("class", "bg-red-400 rounded-xl ps-2 pe-2 border cursor-pointer")
                newTag.innerHTML = _val
                newTag.addEventListener("click", () => {
                    newTag.remove()
                    const toJson = JSON.parse(document.querySelector('#product_tags').value)
                    let idx = toJson.indexOf(_val);
                    toJson.splice(idx, 1);
                    availableTags.push(_val)
                    document.querySelector('#product_tags').value = JSON.stringify(toJson)
                })
                document.querySelector('#tag_list').append(newTag)
                document.querySelector("#tags").value = "";

                if (list == '') {
                    document.querySelector('#product_tags').value = JSON.stringify([_val])

                    let idx = availableTags.indexOf(_val);
                    if (idx >= 0) {
                        availableTags.splice(idx, 1);
                    }
                } else {
                    const toJson = JSON.parse(list)
                    toJson.push(_val)
                    document.querySelector('#product_tags').value = JSON.stringify(toJson)
                    var idx = availableTags.indexOf(_val);
                    if (idx >= 0) {
                        availableTags.splice(idx, 1);
                    }
                }
            }
        }
    })

    function previewFiles() {
        console.log('1');
        const preview = document.querySelector("#preview");
        const files = document.querySelector("#file_input").files;

        // if(document.querySelectorAll("#preImageChild")) document.querySelectorAll("#preImageChild").forEach(item=>item.remove())
        // document.querySelector('#product_images').value = "[]"

        function readAndPreview(file) {
            console.log(5);
            // Make sure `file.name` matches our extensions criteria
            // if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
            const reader = new FileReader();
            console.log('3');
            reader.addEventListener(
                "load",
                () => {
                    const {
                        result
                    } = reader
                    console.log('2');

                    const newDiv = document.createElement('div')
                    const newImg = document.createElement('img')

                    const product_images = JSON.parse(document.querySelector('#product_images').value)

                    newDiv.setAttribute("class", "col-md-2")
                    newDiv.id = "preImageChild"
                    newImg.setAttribute("class", "w-full rounded-lg")
                    newImg.setAttribute("src", result)
                    product_images.push(result)

                    document.querySelector('#product_images').value = JSON.stringify(product_images)


                    newDiv.append(newImg)
                    document.querySelector('#product_images_preview').append(newDiv)
                },
                false,
            );

            reader.readAsDataURL(file);
            // }
        }

        if (files) {
            Array.prototype.forEach.call(files, readAndPreview);
        }
    }

    const picker = document.querySelector("#file_input");
    picker.addEventListener("change", previewFiles);
</script>