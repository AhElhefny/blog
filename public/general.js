Livewire.on('commentAdded',$comment => {
    console.log($comment)
    let div=document.createElement('div')
div.innerHTML+=`<article class="flex bg-gray-100 border border-gray-200 p-6 mt-7 rounded-xl space-x-4">
            <div class="flex-shrink-0">
                <img src="https://i.pravatar.cc/60?u=${$comment[1].id}" width="60" height="60" class="rounded-xl" alt="">
            </div>
            <div>
                <header class="mb-4">
                    <h3 class="font-bold">${$comment[1].name}</h3>
                    <p class="text-xs">
                        Posted
                        <time>${new Date($comment[0].created_at).toDateString()}</time>
                    </p>
                </header>
                <p>
                    ${$comment[0].body}
                </p>
            </div>
        </article>`
    let parent= document.getElementById('comm')
    parent.insertBefore(div,parent.firstChild)
})



