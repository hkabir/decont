
var Invoice = Class.create({
    line_item_number: 1,
    initialize: function (html, item) {
        this.line_item_html = html
        this.line_item_number = item
        this.validate();
    },
    is_valid: function () {
        return ($F('client-id') != '' && this.total() > 0)
    },
    validate: function () {


        if (this.is_valid())
        {
            Field.enable('save');
            $('note').style.display = 'none'
            return true
        } else
        {
            Field.disable('save')
            $('note').style.display = ''
            return false
        }

    },
    indexed_line_item_html: function () {
        return this.line_item_html.replace(/INDEX_ID/g, this.line_item_number)
    },
    add_line_item: function () {
        //alert(this.line_item_number);
        $('items_row').insert(this.indexed_line_item_html())
        //$('items-' + String(this.line_item_number) + '-qty').focus()
        this.line_item_number++

    },
    remove_line_item: function (index) {
        Element.remove(index)
        this.refresh()
    },
    to_money: function (amount) {
        return Number(amount).toFixed(2)
    },
    sub_total: function () {
        var In = this
        return $$('.item').inject(0, function (sum, row) {
            var qty = Number($F('items-' + row.id + '-qty'))
            var price = Number($F('items-' + row.id + '-price'))
            var rate = Number($F('items-' + row.id + '-rate'))
//            var taxRate = Number($F('item-' + row.id + '-taxrate'))
//            var currencyId = $F('item-' + row.id + '-currencyId')
//            if (currencyId == 2)
//                var currency = Number(1)
//            if (currencyId == 1)
//                var currency = Number(4.17)
//            if (currencyId == 3)
//                var currency = Number(4.50)
            
           // var currency = Number(currencies[currencyId])
            
            var line_total = qty * price * rate

           // var itemTaxRate = (line_total * taxRate) / 100

            //$('InvoiceTaxAmount').value = itemTaxRate

            //$('items-' + row.id + '-qty').value = In.to_money(qty)
            //$('items-' + row.id + '-price').value = In.to_money(price)
            $('items-' + row.id + '-total').update(In.to_money(line_total))
            return sum + line_total
        })
    },
    tax: function () {
       //var line_tax = 0
        return $$('.item').inject(0, function (sum, row) {
            var qty = Number($F('items-' + row.id + '-qty'))
            var price = Number($F('items-' + row.id + '-price'))
//            var taxRate = Number($F('Item-' + row.id + '-TaxRate'))
//            var currencyId = $F('item-' + row.id + '-currencyId')
//            if (currencyId == 2)
//                var currency = Number(1)
//            if (currencyId == 1)
//                var currency = Number(4.17)
//            if (currencyId == 3)
//                var currency = Number(4.50)
            //var currency = Number(currencies[currencyId])
            //line_tax = line_tax + ((qty * price * currency* taxRate)/100)

            return sum + ((qty * price)/100)
        })
    },
//    tax: function() {
//     //var tax_rate = Number($F('InvoiceTaxRate')) 
//     var total_tax = this.taxTotal()
//     //tax_total = Math.round((tax_rate * 0.01 * taxable_amount) * 1000) / 1000
//     return Math.round(total_tax)
//    },
    total: function () {
        return this.sub_total() + this.tax()
    },
    refresh: function () {
        //$('subtotal').update('$' + this.to_money(this.sub_total())) 
        //$('total').update('$' + this.to_money(this.total())) 
        //$('tax').update('$' + this.to_money(this.tax())) 
        $('grand_total').update(this.to_money(this.sub_total()))
        //$('total').update(this.to_money(this.total()))
        //$('tax').update(this.to_money(this.tax()))
        this.validate();
    }


});
