@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Record New Sale</h2>

    <form action="{{ route('food_sales.store') }}" method="POST">
        @csrf

<div class="food-select-container mb-3">
        <label for="food_search">Select Food</label>
        
        <!-- Custom searchable input -->
        <div style="position: relative;">
            <input 
                type="text" 
                id="food_search" 
                class="search-box" 
                placeholder="-- Search and Select Food --"
                autocomplete="off"
                readonly
            >
            <div class="dropdown-arrow"></div>
        </div>
        
        <!-- Dropdown list -->
        <div id="dropdown_list" class="dropdown-list"></div>
        
        <!-- Hidden original select for form submission -->
        <select id="food_id" name="food_id" required>
            <option value="">-- Search and Select Food --</option>
        </select>
    </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
        </div>

        <div class="mb-3">
        <label for="service_id" class="form-label">Served By</label>
        <select name="serviced_by" id="serviced_by" class="form-select" required>
        <option value="">-- Select Service Staff --</option>
        @foreach($services as $service)
            <option value="{{ $service->user_id }}">
                {{ $service->service_name }} - {{ $service->user->name }}
            </option>
        @endforeach
        </select>
        </div>


        <button type="submit" class="btn btn-success">Save Sale</button>
    </form>
</div>

{{-- Enable searchable dropdown --}}

<style>
    .food-select-container {
            position: relative;
            /* width: 100%; */
            /* max-width: 400px; */
            margin: 0 auto;
        }

        .food-select-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .search-box {
            width: 100%;
            padding: 12px 40px 12px 12px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 6px;
            outline: none;
            cursor: pointer;
            background-color: white;
            transition: border-color 0.3s ease;
        }

        .search-box:focus {
            border-color: #007bff;
            cursor: text;
        }

        .search-box::placeholder {
            color: #999;
        }

        .dropdown-arrow {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 6px solid #666;
            pointer-events: none;
            transition: transform 0.3s ease;
        }

        .dropdown-arrow.open {
            transform: translateY(-50%) rotate(180deg);
        }

        .dropdown-list {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 2px solid #ddd;
            border-top: none;
            border-radius: 0 0 6px 6px;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
        }

        .dropdown-list.show {
            display: block;
        }

        .dropdown-item {
            padding: 12px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
            transition: background-color 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-item.selected {
            background-color: #007bff;
            color: white;
        }

        .no-results {
            padding: 12px;
            text-align: center;
            color: #666;
            font-style: italic;
        }

        /* Hidden original select for form submission */
        #food_id {
            display: none;
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .food-select-container {
                max-width: 100%;
            }
            
            .search-box {
                font-size: 16px; /* Prevents zoom on iOS */
            }
        }
</style>


<script>
        // ✅ Fetch data from Laravel controller
        const foods = @json($foods);

        class SearchableSelect {
            constructor() {
                this.searchBox = document.getElementById('food_search');
                this.dropdownList = document.getElementById('dropdown_list');
                this.hiddenSelect = document.getElementById('food_id');
                this.dropdownArrow = document.querySelector('.dropdown-arrow');
                this.isOpen = false;
                this.selectedItem = null;
                this.filteredFoods = [...foods];

                this.init();
            }

            init() {
                this.populateHiddenSelect();
                this.searchBox.addEventListener('click', () => this.toggleDropdown());
                this.searchBox.addEventListener('input', (e) => this.handleSearch(e));
                this.searchBox.addEventListener('keydown', (e) => this.handleKeydown(e));
                
                document.addEventListener('click', (e) => {
                    if (!e.target.closest('.food-select-container')) {
                        this.closeDropdown();
                    }
                });

                this.renderDropdown();
            }

            populateHiddenSelect() {
                this.hiddenSelect.innerHTML = '<option value="">-- Search and Select Food --</option>';
                foods.forEach(food => {
                    const option = document.createElement('option');
                    option.value = food.id;
                    option.textContent = `${food.name} (${parseFloat(food.price).toFixed(2)})`;
                    this.hiddenSelect.appendChild(option);
                });
            }

            toggleDropdown() {
                if (this.isOpen) {
                    this.closeDropdown();
                } else {
                    this.openDropdown();
                }
            }

            openDropdown() {
                this.isOpen = true;
                this.searchBox.removeAttribute('readonly');
                this.searchBox.focus();
                this.dropdownList.classList.add('show');
                this.dropdownArrow.classList.add('open');
                this.renderDropdown();
            }

            closeDropdown() {
                this.isOpen = false;
                this.searchBox.setAttribute('readonly', '');
                this.dropdownList.classList.remove('show');
                this.dropdownArrow.classList.remove('open');
                
                if (!this.selectedItem) {
                    this.searchBox.value = '';
                    this.searchBox.placeholder = '-- Search and Select Food --';
                }
            }

            handleSearch(e) {
                const searchTerm = e.target.value.toLowerCase();
                this.filteredFoods = searchTerm === ''
                    ? [...foods]
                    : foods.filter(food => 
                        food.name.toLowerCase().includes(searchTerm) ||
                        food.price.toString().includes(searchTerm)
                    );
                this.renderDropdown();
            }

            handleKeydown(e) {
                if (!this.isOpen) return;

                const items = this.dropdownList.querySelectorAll('.dropdown-item');
                let currentIndex = -1;

                items.forEach((item, index) => {
                    if (item.classList.contains('selected')) {
                        currentIndex = index;
                    }
                });

                switch (e.key) {
                    case 'ArrowDown':
                        e.preventDefault();
                        currentIndex = currentIndex < items.length - 1 ? currentIndex + 1 : 0;
                        this.highlightItem(currentIndex);
                        break;
                    case 'ArrowUp':
                        e.preventDefault();
                        currentIndex = currentIndex > 0 ? currentIndex - 1 : items.length - 1;
                        this.highlightItem(currentIndex);
                        break;
                    case 'Enter':
                        e.preventDefault();
                        if (currentIndex >= 0 && items[currentIndex]) {
                            this.selectItem(this.filteredFoods[currentIndex]);
                        }
                        break;
                    case 'Escape':
                        this.closeDropdown();
                        break;
                }
            }

            highlightItem(index) {
                const items = this.dropdownList.querySelectorAll('.dropdown-item');
                items.forEach((item, i) => {
                    if (i === index) {
                        item.classList.add('selected');
                        item.scrollIntoView({ block: 'nearest' });
                    } else {
                        item.classList.remove('selected');
                    }
                });
            }

            renderDropdown() {
                this.dropdownList.innerHTML = '';

                if (this.filteredFoods.length === 0) {
                    const noResults = document.createElement('div');
                    noResults.className = 'no-results';
                    noResults.textContent = 'No food items found';
                    this.dropdownList.appendChild(noResults);
                    return;
                }

                this.filteredFoods.forEach((food, index) => {
                    const item = document.createElement('div');
                    item.className = 'dropdown-item';
                    item.textContent = `${food.name} (${parseFloat(food.price).toFixed(2)})`;
                    
                    item.addEventListener('click', () => {
                        this.selectItem(food);
                    });

                    item.addEventListener('mouseenter', () => {
                        this.highlightItem(index);
                    });

                    this.dropdownList.appendChild(item);
                });
            }

            selectItem(food) {
                this.selectedItem = food;
                this.searchBox.value = `${food.name} (${parseFloat(food.price).toFixed(2)})`;
                this.hiddenSelect.value = food.id;
                this.hiddenSelect.dispatchEvent(new Event('change'));
                this.closeDropdown();
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            new SearchableSelect();
        });
    </script>


@endsection
