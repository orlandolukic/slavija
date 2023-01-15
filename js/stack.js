Stack = function () {
    let first = null;
    let elements = 0;
    let Element = function (c) {
        return {
            content: c,
            next: null
        }
    }

    // Insert element onto stack
    let push = function (content) {
        if ( content === null )
            return;
        let elem = new Element(content);
        if ( first === null ) {
            first = elem;
        } else {
            elem.next = first;
            first = elem;
        }
        elements++;
    }

    // Iterate through the whole list
    let forEach = function (runnable) {
        let current = first;
        while( current != null ) {
            runnable( current.content );
            current = current.next;
        }
    }

    // Deletes element from the top of the stack
    let pop = function () {
        if ( elements > 0 ) {
            let x = first;
            first = first.next;
            elements--;
            return x.content;
        } else
            return null;
    }

    let peek = function () {
        return elements > 0 ? first.content : null;
    }

    let emptyStack = function () {
        first = null;
        elements = 0;
    }

    return {
        push: push,
        forEach: forEach,
        pop: pop,
        peek: peek,
        empty: emptyStack,
        isEmpty: function () { return elements === 0; },
        size: function () { return elements; }
    }
}