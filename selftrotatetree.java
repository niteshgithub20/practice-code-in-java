	/* Class node is defined as :
    class Node 
    	int val;	//Value
    	int ht;		//Height
    	Node left;	//Left child
    	Node right;	//Right child

	*/

	static Node insert(Node root,int val)
    {
        if(root == null)
        {
            root = new Node();
            root.val = val;
            root.ht = get_height(root);
        }
        if(val > root.val)
        {
            root.right = insert(root.right,val);
        }	
        else if(val < root.val){
            root.left = insert(root.left,val);
        }
        int bf = get_height(root.left) - get_height(root.right);
        if(bf > 1){
            int child_bf = get_height(root.left.left) - get_height(root.left.right);
            if(child_bf > 0)
            {
                root = RightRotate(root);
            }
            else if(child_bf < 0)
            {
                root.left = LeftRotate(root.left);
                root = RightRotate(root);
            }
        }
        else if(bf < -1)
        {
            int child_bf = get_height(root.right.left) - get_height(root.right.right);
            if(child_bf > 0)
            {
                root.right = RightRotate(root.right);
                root = LeftRotate(root);
            }
            else if(child_bf < 0)
            {
                
                root = LeftRotate(root);
            }
        }
        else 
        {
            root.ht = get_height(root);
        }
        return root;
        
    }
static Node RightRotate(Node root){
    Node newNode = root.left;
    Node temp = newNode.right;
    newNode.right = root;
    root.left = temp;
    root.ht = get_height(root);
    newNode.ht = get_height(newNode);
    return newNode;
}
static Node LeftRotate(Node root){
    Node newNode = root.right;
    Node temp = newNode.left;
    newNode.left = root;
    root.right = temp;
    root.ht = get_height(root);
    newNode.ht = get_height(newNode);
    return newNode;
}
 static int get_height(Node node){
     if(node == null){
         return -1;
     }
     return Math.max(get_height(node.left),get_height(node.right)) +1;
 }