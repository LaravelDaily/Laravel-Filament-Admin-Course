<td colspan="5" class="px-4 py-3 filament-tables-text-column">
    Total:
</td>
<td class="filament-tables-cell">
    <div class="px-4 py-3 filament-tables-text-column">
        {{ money($this->getTableRecords()->sum('subtotal')) }}
    </div>
</td>
<td class="filament-tables-cell">
    <div class="px-4 py-3 filament-tables-text-column">
        {{ money($this->getTableRecords()->sum('taxes')) }}
    </div>
</td>
<td class="filament-tables-cell">
    <div class="px-4 py-3 filament-tables-text-column">
        {{ money($this->getTableRecords()->sum('total')) }}
    </div>
</td>
