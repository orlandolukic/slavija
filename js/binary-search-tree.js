BinarySearchTree = function () {
    let root = null;
    let elements = 0;
    let Node = function (c) {
        return {
            content: c,
            left: null,
            right: null
        }
    }

    // Insert element into binary search tree
    let insert = function (content) {

        if ( content == null )
            return;

        let node = new Node(content);
        if ( root == null ) {
            root = node;
        } else {
            let current = root;
            let toComp = content.compareTo !== undefined;
            let toGo = 0;
            let added = false;
            while( !added ) {
                if ( current.content.compareTo !== undefined ) {
                    toGo =  current.content.compareTo(content);
                } else if ( toComp ) {
                    toGo = content.compareTo(current.content);
                } else {
                    toGo = content < current.content ? -1 : 1;
                }

                if ( toGo < 0 ) {   // go left
                    if ( current.left === null ) {
                        added = true;
                        current.left = node;
                    } else
                        current = current.left;
                } else {            // go right
                    if ( current.right === null ) {
                        added = true;
                        current.right = node;
                    } else
                        current = current.right;
                }
            }
        }
        elements++;
    }

    // INORDER
    let forEachInorder = function (runnable) {
        let current = root;
        let stack = new Stack();
        while( current != null ) {
            stack.push(current);
            current = current.left;
        }
        while( !stack.isEmpty() ) {
            current = stack.pop();
            runnable( current.content );
            current = current.right;
            while( current !==  null ) {
                stack.push(current);
                current = current.left;
            }
        }
    }

    // POSTORDER
    let forEachPostorder = function (runnable) {
        let current = root;
        let stack = new Stack();
        while( current != null ) {
            stack.push(current);
            current = current.right;
        }
        while( !stack.isEmpty() ) {
            current = stack.pop();
            runnable( current.content );
            current = current.left;
            while( current !==  null ) {
                stack.push(current);
                current = current.right;
            }
        }
    }

    // PREORDER
    let forEachPreorder = function (runnable) {
        if ( root === null )
            return;
        let current;
        let stack = new Stack();
        stack.push( root );
        while( !stack.isEmpty() ) {
            current = stack.pop();
            runnable( current.content );
            if ( current.right !== null )
                stack.push( current.right );
            if ( current.left !== null )
                stack.push( current.left );
        }
    }

    let contains = function (content) {
        let current = root;
        let toComp = content.compareTo !== undefined;
        let toGo;
        let finished = false;
        let found = false;
        while( !finished ) {
            if ( current.content.compareTo !== undefined ) {
                toGo =  current.content.compareTo(content);
            } else if ( toComp ) {
                toGo = content.compareTo(current.content);
            } else {
                toGo = content < current.content ? -1 : (content === current.content ? 0 : 1);
            }

            if ( toGo === 0 ) {
                found = true;
                finished = true;
            } else if ( toGo < 0 ) {   // go left
                if ( current.left === null ) {
                    finished = true;
                } else {
                    current = current.left;
                }
            } else {            // go right
                if ( current.right === null ) {
                    finished = true;
                } else {
                    current = current.right;
                }
            }
        }
        return found;
    }

    // Deletes element from the tree
    let deleteFromTree = function (content) {
        let prevPrev = null;
        let prev = null;
        let current = root;
        let toComp = content.compareTo !== undefined;
        let toGo = 0;
        let finished = false;
        let found = false;
        while( !finished ) {
            if ( current.content.compareTo !== undefined ) {
                toGo =  current.content.compareTo(content);
            } else if ( toComp ) {
                toGo = content.compareTo(current.content);
            } else {
                toGo = content < current.content ? -1 : (content === current.content ? 0 : 1);
            }

            if ( toGo === 0 ) {
                found = true;
                finished = true;
            } else if ( toGo < 0 ) {   // go left
                if ( current.left === null ) {
                    finished = true;
                } else {
                    prevPrev = prev;
                    prev = current;
                    current = current.left;
                }
            } else {            // go right
                if ( current.right === null ) {
                    finished = true;
                } else {
                    prevPrev = prev;
                    prev = current;
                    current = current.right;
                }
            }
        }

        if ( found ) {
            if ( current === root ) {
                root = null;
            } else {
                if (current.left === null && current.right === null) {
                    if ( prev.left === current ) {
                        prev.left = null;
                    } else if ( prev.right === current ) {
                        prev.right = null;
                    }
                } else if ( current.left !== null && current.right !== null ) {

                    let s = current.right;
                    let prevS = null;
                    while( s.left !== null ) {
                        prevS = s;
                        s = s.left;
                    }
                    current.content = s.content;
                    if ( prevS === null ) {
                        current.right = null;
                    } else {
                        prevS.left = s.right;
                    }


                } else {
                    if ( current.left === null ) {
                        if ( prev.left === current ) {
                            prev.left = current.right;
                        } else if ( prev.right === current ) {
                            prev.right = current.right;
                        }
                    } else {
                        if ( prev.left === current ) {
                            prev.left = current.left;
                        } else if ( prev.right === current ) {
                            prev.right = current.left;
                        }
                    }
                }
            }
        }
    }

    let emptyTree = function () {
        root = null;
        elements = 0;
    }

    return {
        insert: insert,
        inorder: forEachInorder,
        preorder: forEachPreorder,
        postorder: forEachPostorder,
        sortAscending: function (runnable) { forEachInorder(runnable); },
        sortDescending: function (runnable) { forEachPostorder(runnable); },
        delete: deleteFromTree,
        empty: emptyTree,
        search: contains,
        size: function () { return elements; }
    }
}

/*
 let t = new BinarySearchTree();
 t.insert(16);
 t.insert(14);
 t.insert(19);
 t.insert(11);
 t.insert(17);
 t.insert(29);
 t.insert(5);
 t.insert(12);
 t.insert(8);
 t.insert(21);
 t.insert(31);
 t.insert(26);
 t.insert(25);
 t.insert(27);
t.delete(31);
t.delete(19);
t.delete(26);
t.sortAscending((e) => {
   console.log(e);
});
 */

