<div class="grid grid-cols-6 gap-6 py-3">
    {!! Form::label('lawyer_id', 'Select a lawyer', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    <div class="col-span-4 sm:col-span-2">
        {!! Form::select('lawyer_id', $lawyers,  null, ['class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) !!}
    </div>
</div>
<div class="grid grid-cols-6 gap-6 py-3">
    {!! Form::label('valid_from', 'Valid from', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    <div class="col-span-6 sm:col-span-3">
        <input type="datetime-local" id="valid_from" name="valid_from" class="'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm'">
    </div>
</div>
<div class="grid grid-cols-6 gap-6 py-3">
    {!! Form::label('valid_to', 'Valid to', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    <div class="col-span-6 sm:col-span-3">
        <input type="datetime-local" id="valid_to" name="valid_to" class="'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm'">
    </div>
</div>
<div class="px-4 py-3 text-right sm:px-6">
    {!! Form::submit('Submit', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'] ) !!}
</div>
