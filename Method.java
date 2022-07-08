import java.util.*;
class Method
{
    public void m1(int x,int y)
    {
        int add = 0;
        add = x+y;
        System.out.println("Addition = "+add);
       return rever(add);
    }
    public void rever(int add)
    {
        int p = 0;
        p = add.reverse();
        System.out.println(p);
    }
    
    public static void main(String[] args)
    {
       Scanner sc = new Scanner(System.in);
       int i = sc.nextInt();
       int j = sc.nextInt();
       Method m = new Method();
       m.m1(i,j);
    }
}