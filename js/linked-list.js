LinkedList = function () {
    let first = null;
    let last = null;
    let elements = 0;
    let Element = function (c) {
        let content = c;
        let next = null;

        return {
            content: content,
            next: next
        }
    }

    // Insert element into linked list
    let insert = function (content) {

        if ( content === null )
            return;

        if ( first == null ) {
            first = last = new Element(content);
        } else {
            last = last.next = new Element(content);
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

    // Checks if content exists within the linked list
    let contains = function (content) {
        let current = first;
        let equals = false;
        let x = content.equals !== undefined;
        while( current != null ) {

            if ( current.content.equals !== undefined ) {
                equals = current.content.equals(content);
            } else if ( x ) {
                equals = content.equals(current.content);
            } else {
                equals = current.content === content;
            }

            if ( equals )
                return true;
            current = current.next;
        }
        return false;
    }

    /**
     *
     * @param content
     * @returns {null|*}
     */
    let getContent = function ( content ) {
        let current = first;
        let equals = false;
        let x = content.equals !== undefined;
        while( current != null ) {

            if ( current.content.equals !== undefined ) {
                equals = current.content.equals(content);
            } else if ( x ) {
                equals = content.equals(current.content);
            } else {
                equals = current.content === content;
            }

            if ( equals )
                return current.content;
            current = current.next;
        }
        return null;
    }

    // Deletes first from the list.
    let deleteFirst = function () {
        if ( first === null )
            return null;
        else {
            let x = first;
            first = first.next;
            return x;
        }
    }

    // Deletes element from given index.
    let deleteAt = function (i) {
        let ind = 0;
        let previous = null;
        let current = first;
        let deleted = false;
        while( current != null && !deleted ) {
            if ( ind == i ) {
                if ( previous == null ) {
                    first = first.next;
                    current = first;
                    if ( first == null )
                        last = null;
                } else {
                    previous.next = current.next;
                    if ( current === last )
                        last = previous;
                }
                elements--;
                deleted = true;
            }
            ind++;
            previous = current;
            current = current.next;
        }
    }

    // Deletes element from the list
    let deleteFromList = function (comp) {
        let current = first;
        let previous = null;
        let equals = false;
        let x = comp.equals !== undefined;
        while( current != null ) {

            if ( current.content.equals !== undefined ) {
                equals = current.content.equals(comp);
            } else if ( x ) {
                equals = comp.equals(current.content);
            } else {
                equals = current.content === comp;
            }

            if ( equals ) {
                if ( previous == null ) {
                    first = first.next;
                    current = first;
                    if ( first == null )
                        last = null;
                } else {
                    previous.next = current.next;
                    if ( current === last )
                        last = previous;
                }
                elements--;
                current = current.next;
            } else {
                previous = current;
                current = current.next;
            }
        }
    }

    let emptyList = function () {
        first = last = null;
        elements = 0;
    }

    return {
        insert: insert,
        forEach: forEach,
        delete: deleteFromList,
        empty: emptyList,
        contains: contains,
        deleteFirst: deleteFirst,
        deleteAt: deleteAt,
        getContent: getContent,
        size: function () { return elements; }
    }
}