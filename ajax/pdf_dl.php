<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

function base64_to_jpeg($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen( $output_file, 'wb' );

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $base64_string );

    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[ 1 ] ) );

    // print_r($data[ 1 ]);

    // clean up the file resource
    fclose( $ifp );

    return $output_file;
}

    $data = array();

    foreach ($_POST as $key => $val) {
        $data[$key] = $val;
    }

    $data["CONF_IMG"] = CFile::MakeFileArray(base64_to_jpeg($data["CONF_IMG"], $_SERVER["DOCUMENT_ROOT"]."/bitrix/images/png_img.png"));

    $arLoadProductArray = Array(
        "MODIFIED_BY"    => $USER->GetID(),
        "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
        "IBLOCK_ID"      => 15,
        "PROPERTY_VALUES"=> $data,
        "NAME"           => $data["NAME"],
        "ACTIVE"         => "Y",            // активен
    );

    // print_r($arLoadProductArray);

    if (CModule::IncludeModule('iblock')) {
        $el = new CIBlockElement;

        if($PRODUCT_ID = $el->Add($arLoadProductArray)) {
            print_r($PRODUCT_ID);
        } else {
            print_r($el->LAST_ERROR);
        }
    }
?>