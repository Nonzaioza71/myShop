<?php if (!array_key_exists('type', $_GET)) header("Location: index.php"); ?>

<div class="col-md-12">
    <h1 class="fw-bold fs-4">
        Insert a <?= $_GET['type'] ?> product
    </h1>
    <div class="card shadow rounded-0 col-md-12 mt-3 p-3">
        <form method="post">
            <div class="col-md-12 row mb-3">

                <div class="form-group col-md-4">
                    <label for="product_name">Product Name <span class="text-danger">*</span></label>
                    <input required type="text" name="product_name" id="product_name" class="form-control">
                </div>

                <div class="form-group col-md-4">
                    <label for="product_type">Product Type</label>
                    <!-- <pre><?php print_r($product_type_list) ?></pre> -->
                    <select class="form-select" name="product_type" id="product_type">
                        <?php foreach ($product_type_list as $idx => $item) { ?>
                            <option <?php if ($item['product_type_name'] == $_GET['type']) echo 'selected' ?> value="<?= $item['id'] ?>"><?= strtoupper($item['product_type_name']) ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="product_promotion">Product Promotion</label>
                    <!-- <pre><?php print_r($product_promotion_list) ?></pre> -->
                    <select class="form-select" name="product_promotion" id="product_promotion">
                        <?php foreach ($product_promotion_list as $idx => $item) { ?>
                            <option value="<?= $item['id'] ?>"><?= strtoupper($item['name']) ?></option>
                        <?php } ?>
                    </select>
                </div>

            </div>

            <div class="col-md-12 row mb-3">

                <div class="col-md-12">
                    <div class="col-md-12 d-flex row m-auto">
                        <div class="col-md-8">
                            <label for="product_detail">Product Description</label>
                            <textarea name="product_detail" id="product_detail" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-md-4 pe-0">
                            <div class="col-md-12 mb-3">
                                <label for="product_price">Product price</label>
                                <input class="form-control" step="0.25" min="0" oninput="if(this.value < 0) this.value = 0" value="0" type="number" name="product_price" id="product_price">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="product_detail">Product tag</label>
                                <input type="search" class="form-control" id="tags">
                                <div class="col-md-12 border d-flex mt-5 p-2" id="tag_list"></div>
                            </div>

                            <input type="hidden" name="product_tags" id="product_tags">
                        </div>
                    </div>
                    <div class="col-md-12 d-flex row m-auto">
                        <div class="col-md-8">
                            <label for="product_iframe">Product Iframe link</label>
                            <input name="product_iframe" id="product_iframe" oninput="document.querySelector('#product_iframe_preview').src = this.value" class="form-control" />
                        </div>
                        <div class="col-md-4 pe-0">
                            <label for="product_images">Product Images</label>
                            <input class="form-control" type="file" id="file_input" multiple>
                            <input type="text" name="product_images" id="product_image">
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
                                <iframe onload="loadSuccess(false)" id="product_iframe_preview" class="w-full" style="height:calc(90vw / 2)" title="Low Poly Knight" frameborder="0" mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src=""> </iframe>
                            </div>
                        </div>
                    </div>

                </div>

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
        const preview = document.querySelector("#preview");
        const files = document.querySelector("input[type=file]").files;

        function readAndPreview(file) {
            // Make sure `file.name` matches our extensions criteria
            if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
                const reader = new FileReader();

                reader.addEventListener(
                    "load",
                    () => {
                        const {
                            result
                        } = reader

                        const newDiv = document.createElement('div')
                        const newImg = document.createElement('img')

                        newDiv.setAttribute("class", "col-md-2")
                        newImg.setAttribute("class", "w-full rounded-lg")
                        newImg.setAttribute("src", result)

                        newDiv.append(newImg)
                        document.querySelector('#product_images_preview').append(newDiv)
                    },
                    false,
                );

                reader.readAsDataURL(file);
            }
        }

        if (files) {
            Array.prototype.forEach.call(files, readAndPreview);
        }
    }

    const picker = document.querySelector("#file_input");
    picker.addEventListener("change", previewFiles);
</script>