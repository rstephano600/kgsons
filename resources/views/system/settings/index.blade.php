@extends('layouts.app')

@section('title', 'System Settings')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-gray-500">Admin</a>
            </li>
            <li class="flex items-center">
                <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
            </li>
            <li class="text-gray-600" aria-current="page">System Settings</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">System Settings</h2>
        <p class="text-gray-600">Configure your application settings</p>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="p-6">
                <!-- Tabs for Settings Groups -->
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8">
                        @foreach($groups as $group)
                            <button type="button" 
                                    onclick="showGroup('{{ $group }}')"
                                    class="group-tab whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm 
                                           {{ $loop->first ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                                {{ ucfirst($group) }}
                            </button>
                        @endforeach
                    </nav>
                </div>

                <!-- Settings Groups -->
                <div class="mt-6 space-y-6">
                    @foreach($settings as $group => $groupSettings)
                        <div id="group-{{ $group }}" class="settings-group {{ $loop->first ? '' : 'hidden' }}">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">{{ ucfirst($group) }} Settings</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach($groupSettings as $setting)
                                    <div>
                                        <label for="settings[{{ $setting->key }}]" class="block text-sm font-medium text-gray-700">
                                            {{ $setting->display_name ?? ucwords(str_replace('_', ' ', $setting->key)) }}
                                        </label>
                                        
                                        @if($setting->type === 'text')
                                            <input type="text" name="settings[{{ $setting->key }}]" id="settings[{{ $setting->key }}]" 
                                                   value="{{ old('settings.'.$setting->key, $setting->value) }}" 
                                                   class="mt-1 form-input w-full">
                                        @elseif($setting->type === 'textarea')
                                            <textarea name="settings[{{ $setting->key }}]" id="settings[{{ $setting->key }}]" 
                                                      rows="3" class="mt-1 form-textarea w-full">{{ old('settings.'.$setting->key, $setting->value) }}</textarea>
                                        @elseif($setting->type === 'select')
                                            <select name="settings[{{ $setting->key }}]" id="settings[{{ $setting->key }}]" 
                                                    class="mt-1 form-select w-full">
                                                @foreach($setting->options as $option)
                                                    <option value="{{ $option['value'] }}" {{ $setting->value == $option['value'] ? 'selected' : '' }}>
                                                        {{ $option['label'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @elseif($setting->type === 'checkbox')
                                            <div class="mt-2">
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" name="settings[{{ $setting->key }}]" 
                                                           value="1" {{ $setting->value ? 'checked' : '' }} 
                                                           class="form-checkbox h-4 w-4 text-blue-600">
                                                    <span class="ml-2 text-sm text-gray-700">{{ $setting->details ?? '' }}</span>
                                                </label>
                                            </div>
                                        @endif
                                        
                                        @if($setting->description)
                                            <p class="mt-1 text-sm text-gray-500">{{ $setting->description }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="px-6 py-3 bg-gray-50 text-right">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save mr-2"></i> Save Settings
                </button>
            </div>
        </form>
    </div>

    <script>
        function showGroup(group) {
            // Hide all groups
            document.querySelectorAll('.settings-group').forEach(el => {
                el.classList.add('hidden');
            });
            
            // Show selected group
            document.getElementById(`group-${group}`).classList.remove('hidden');
            
            // Update active tab
            document.querySelectorAll('.group-tab').forEach(tab => {
                tab.classList.remove('border-blue-500', 'text-blue-600');
                tab.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
            });
            
            event.currentTarget.classList.add('border-blue-500', 'text-blue-600');
            event.currentTarget.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
        }
    </script>
@endsection