function get_configurator (email = "", lead_funnel = "", lead_link = "") {
    let link_el = `https://new.tinger.ru/include/configurator_widget.php?email=${email}&lead_funnel=${lead_funnel}&lead_link=${lead_link}`
        src_template = `<iframe id='configurator-widget' name="tingerConfigurator" src='${link_el}' frameborder='0' scrolling='no' width='100%' height='100%'>Ваш браузер не поддерживает фреймы!</iframe>`,
        result = null,
        element = document.querySelector('body');

    if (element !== null) {
        document.write(src_template);
    } else {
        console.log("Ошибка виджета! Элемент не найден");
    }
}
