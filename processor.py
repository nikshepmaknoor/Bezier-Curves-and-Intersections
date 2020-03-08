import matplotlib.pylab as plt
import bezier
import numpy as np
import seaborn
seaborn.set()

l1 = list(map(float,input().strip().split()))[:3]

l2 = list(map(float,input().strip().split()))[:3]

l3 = list(map(float,input().strip().split()))[:3]

l4 = list(map(float,input().strip().split()))[:3]

nodes1 = np.asfortranarray([l1,l2])

nodes2 = np.asfortranarray([l3,l4])

curve1 = bezier.Curve(nodes1, degree=2)

curve2 = bezier.Curve.from_nodes(nodes2)

intersections = curve1.intersect(curve2)

s_vals = np.asfortranarray(intersections[0, :])

points = curve1.evaluate_multi(s_vals)

print(points)

ax = curve1.plot(num_pts=256)

_ = curve2.plot(num_pts=256, ax=ax)

lines = ax.plot(points[0, :], points[1, :],marker="o", linestyle="None", color="black")

_ = ax.axis("scaled")

_ = ax.set_xlim(-0.125, 1.125)

_ = ax.set_ylim(-0.0625, 0.625)