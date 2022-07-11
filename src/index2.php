<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-12 container">

    <h3 class="text-center mb-4 bold">Dynamic Form drug2.json </h3>

    <?php
    $filedata = file_get_contents('drug2.json');
    $details = json_decode($filedata);
    $form_fields = $details->fields;
    ?>

    <form class="m-auto border-2 rounded shadow p-8 w-1/2">

        <?php foreach ($form_fields as $key => $value) : ?>

            <?php
            $required = isset($value->isRequired) == 1 ? ($value->isRequired == true ? 'required' : '') : '';
            $isReadonly = isset($value->isReadonly) == 1 ? ($value->isReadonly == true ? 'readonly' : '') : '';
            ?>
            <div class="mb-6">
                <label for=<?php echo $value->type ?> class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $value->label ?></label>
                <?php if ($value->type == 'dropdown') { ?>
                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select Option</option>
                        <?php foreach ($value->items as $val) : ?>
                            <option value=<?php echo $val->value ?>><?php echo $val->text ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php } else { ?>
                    <input key=<?php echo $value->key ?> type=<?php echo $value->type ?> <?php echo $required, $isReadonly ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?php } ?>

            </div>
        <?php endforeach; ?>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</body>

</html>