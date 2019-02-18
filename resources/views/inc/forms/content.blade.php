<form class='content-edit' method='post'>
    @csrf
    <fieldset>
        <input id='form-element-id' type='hidden' name='id' value='{{ isset($content["id"]) ? $content["id"] : "" }}' />
        <p>
            <label for='form-element-title'>Title:</label><br/>
            <input id='form-element-title' type='text' name='title'  value='{{ isset($content["title"]) ? $content["title"] : "" }}' required/>
        </p>
        <p>
            <label for='form-element-key'>Unique Key:</label><br/>
            <input id='form-element-key' type='text' name='key' value='{{ isset($content["key"]) ? $content["key"] : "" }}' required/>
        </p>
        <p>
            <label for='form-element-data'>Content:</label><br/>
            <textarea id='form-element-data' type='textarea' name='data' required>{{ isset($content["data"]) ? $content["data"] : "" }}</textarea>
        </p>
        <p>
            <label for='form-element-type'>Type:</label><br/>
            <input id='form-element-type' type='text' name='type' value='{{ isset($content["type"]) ? $content["type"] : "" }}' />
        </p>
        <p>
            <label for='form-element-filter'>Filter:</label><br/>
            <input id='form-element-filter' type='text' name='filter' value='{{ isset($content["filter"]) ? $content["filter"] : "" }}' />
        </p>
        <p class='buttonbar'>
            @if(isset($content['created_at']))
                <span>
                    <input id='form-element-save' type='submit' name='save' value='Save' formaction="/content/save" />
                </span>
                &nbsp;
                <span>
                    <input id='form-element-delete' type='submit' name='delete' value='Delete' formaction="/content/delete" />
                </span>
            @else
                <span><input id='form-element-create' type='submit' name='create' value='Create' formaction="/content/save" /></span>
            @endif
        </p>
    </fieldset>
</form>