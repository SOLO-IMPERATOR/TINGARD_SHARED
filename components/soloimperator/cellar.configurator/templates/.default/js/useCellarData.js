export function useCellarData(){
    const data = Vue.ref(null);
    const host = "https://tingard.ru";
    const loadData = async() => {
        try{
            const result = await fetch(host+'/local/api/cellar/series/full/');

            const json = await result.json();
			
            data.value = json;
        }catch(e){
            data.value = false;

            alert('Приозошла ошибка загрузки данных! Повторите попытку');
        }
    }
    Vue.onMounted(loadData);
    return data;
}